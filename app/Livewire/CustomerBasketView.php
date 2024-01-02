<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CustomerBasket;

class CustomerBasketView extends Component {
    public $transactionType = 'All';
    public $types = ['All', 'pendingTransaction', 'paymentFinished', 'removedWithoutFinish'];

    public $basketItems;
    public $totalBasketPrice;

    public function mount($transactionType = null) {
        $this->basketItems = $this->getBasketItems($transactionType);
        $this->calculateTotalBasketPrice();
    }

    public function applyFilter() {
        $this->basketItems = $this->getBasketItems($this->transactionType);
        $this->calculateTotalBasketPrice();
        $this->dispatch('basketFilterApplied', $this->transactionType);
    }

    private function getBasketItems($transactionType) {
        if ($transactionType && $transactionType != 'All') {
            return CustomerBasket::where('status', $transactionType)->get();
        } else {
            return CustomerBasket::all();
        }
    }

    private function calculateTotalBasketPrice() {
        $this->totalBasketPrice = $this->basketItems->sum('total_price');
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
}
