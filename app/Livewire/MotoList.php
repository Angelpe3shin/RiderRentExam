<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Moto;
use App\Models\Customer;
use App\Models\CustomerBasket;
use App\Models\Rent;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MotoList extends Component {
    public $motoType = 'All';
    public $types = ['All', 'Street', 'Cruiser', 'Sport', 'Touring', 'Enduro', 'Chopper', 'Adventure', 'Scooter', 'Electric'];

    public $motos;
    public $startDate;
    public $endDate;

    protected $listeners = ['didSelectDate' => 'dateSelected'];

    public function mount($motoType = null) {
        $this->motos = $this->getMotos($motoType);
    }

    private function getMotos($motoType) {
        if ($motoType && $motoType != 'All') {
            return Moto::whereHas('motoModel', function ($query) use ($motoType) {
                $query->where('type', $motoType);
            })->get();
        } else {
            return Moto::all();
        }
    }

    public function render() {
        return view('livewire.moto-list');
    }

    public function applyFilter() {
        $this->motos = $this->getMotos($this->motoType);
        $this->dispatch('filterApplied', $this->motoType);
    }

    public function addToBasket($motoId) {
        $user = Auth::user();
        $moto = Moto::find($motoId);

        $interval = $this->startDate->diff($this->endDate);

        $basketItem = CustomerBasket::create([
            'customer_id' => $user->id,
            'moto_id' => $moto->id,
            'quantity' => 1,
            'status' => 'pendingTransaction',
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'total_price' => $moto->base_rent_price * $interval->d,
            'total_price_currency' => $moto->base_rent_currency,
        ]);
        if ($basketItem->wasRecentlyCreated) {
            \Log::info('addToBasket called with ' . $basketItem);
        } else {
            \Log::error('addToBasket called error');
        }
    }

    public function removeFromBasket($motoId) {
        $basketItem = CustomerBasket::where('moto_id', $motoId);
        if ($basketItem) {
            $basketItem->delete();
            \Log::info('removeFromBasket called for ' . $motoId);
        } else {
            \Log::error('removeFromBasket called but no item found for ' . $motoId);
        }
    }

    #[On('didSelectDate')] 
    public function dateSelected($startDate, $endDate) {
        $this->startDate = new \DateTime($startDate);
        $this->endDate = new \DateTime($endDate);
    }

    public function isRentedOnSelectedDate($moto) {
        if ($this->startDate && $this->endDate) {
            $exists = Rent::where('moto_id', $moto->id)
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
