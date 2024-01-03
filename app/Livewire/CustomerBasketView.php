<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CustomerBasket;
use App\Models\Rent;
use Illuminate\Support\Facades\Auth;

class CustomerBasketView extends Component {
    public $transactionType = 'pendingTransaction';
    public $types = ['All', 'pendingTransaction', 'paymentFinished'];

    public $basketItems;
    public $totalBasketPrice;

    public function mount() {
        $this->basketItems = $this->getBasketItems($this->transactionType);
        $this->calculateTotalBasketPrice();
    }

    public function applyFilter() {
        $this->basketItems = $this->getBasketItems($this->transactionType);
        $this->calculateTotalBasketPrice();
        $this->dispatch('basketFilterApplied', $this->transactionType);
    }

    private function getBasketItems($transactionType) {
        $user = Auth::user();
        if ($transactionType && $transactionType != 'All') {
            return CustomerBasket::where('status', $transactionType)->where('customer_id', $user->id)->get();
        } else {
            return CustomerBasket::where('customer_id', $user->id)->get();
        }
    }

    private function calculateTotalBasketPrice() {
        $this->totalBasketPrice = $this->basketItems->sum('total_price');
    }

    public function getPendingTransactionsCount() {
        return CustomerBasket::where('status', 'pendingTransaction')->count();
    }

    public function getTransactionTypeLabel($transactionType) {
        switch ($transactionType) {
            case 'pendingTransaction':
                return 'Pending';
            case 'paymentFinished':
                return 'History';
            case 'removedWithoutFinish':
                return 'Cancelled';
            default:
                return 'All';
        }
    }

    public function getTransactionTypeColorClass($transactionType) {
        return ucfirst($transactionType);
    }

    public function render() {
        return view('livewire.customer-basket-view');
    }

    public function completeBooking() {
        $user = Auth::user();

        foreach ($this->basketItems as $item) {
            Rent::create([
                'customer_id' => $user->id,
                'moto_id' => $item->moto_id,
                'discount_id' => null,
                'start_date' => $item->start_date,
                'requested_end_date' => $item->end_date,
                'actual_end_date' => null,
                'total_requested_price' => $item->total_price,
                'total_actual_price' => $item->total_price,
                'is_active' => true,
            ]);

            $item->status = 'paymentFinished';
            $item->save();
        }

        $this->applyFilter();
    }    
}
