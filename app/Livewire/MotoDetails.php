<?php

namespace App\Livewire;

use App\Models\Moto;
use App\Models\Rent;
use App\Models\CustomerBasket;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Parsedown;

class MotoDetails extends Component {
    public $id;
    public $moto;

    protected $listeners = ['didSelectDate' => 'dateSelected'];
    public $startDate;
    public $endDate;

    public function mount($id) {
        $this->moto = Moto::findOrFail($id);
    }

    public function render() {
        return view('livewire.moto-details');
    }

    #[On('didSelectDate')] 
    public function dateSelected($startDate, $endDate) {
        $this->startDate = new \DateTime($startDate);
        $this->endDate = new \DateTime($endDate);
    }

    public function addToBasket($motoId) {
        $user = Auth::user();

        $interval = $this->startDate->diff($this->endDate);

        $basketItem = CustomerBasket::create([
            'customer_id' => $user->id,
            'moto_id' => $this->moto->id,
            'quantity' => 1,
            'status' => 'pendingTransaction',
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'total_price' => $this->moto->base_rent_price * $interval->d,
            'total_price_currency' => $this->moto->base_rent_currency,
        ]);
        if ($basketItem->wasRecentlyCreated) {
            \Log::info('addToBasket called with ' . $basketItem);
        } else {
            \Log::error('addToBasket called error');
        }
    }

    public function isRentedOnSelectedDate() {
        if ($this->startDate && $this->endDate) {
            $exists = Rent::where('moto_id', $this->moto->id)
                        ->where(function ($query) {
                            $query->where(function ($q) {
                                $q->whereNotNull('actual_end_date')
                                    ->where('start_date', '<=', $this->startDate)
                                    ->where('actual_end_date', '>=', $this->startDate)
                                    ->orWhere('start_date', '<=', $this->endDate)
                                    ->where('actual_end_date', '>=', $this->endDate);
                            })
                            ->orWhere(function ($q) {
                                $q->whereNull('actual_end_date')
                                    ->where('start_date', '<=', $this->startDate)
                                    ->where('requested_end_date', '>=', $this->startDate)
                                    ->orWhere('start_date', '<=', $this->endDate)
                                    ->where('requested_end_date', '>=', $this->endDate);
                            });
                        })
                        ->exists();
            return $exists;
        } else {
            return false;
        }
    }

    public function isAbleToRent() {
        return ($this->startDate && $this->endDate);
    }
}
