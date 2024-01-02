<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moto;
use Livewire\WithPagination;

class DashboardController extends Controller {
    use WithPagination;

    public function index() {
        return view('dashboard');
    }
}
