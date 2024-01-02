<?php

namespace App\Livewire;

use Livewire\Component;

class MotoDetails extends Component {
    public $moto;

    public function render() {
        return view('livewire.moto-details');
    }
}
