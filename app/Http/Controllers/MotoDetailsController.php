<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Moto;

class MotoDetailsController extends Controller {
    public function details($id) {
        $moto = Moto::findOrFail($id);
        return view('livewire.moto-details', compact('moto'));
    }
}
