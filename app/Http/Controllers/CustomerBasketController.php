<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Livewire;

use App\Http\Livewire\CustomerBasketView;

class CustomerBasketController extends Controller {
    public function basket() {
        return view('basket');
    }
}
