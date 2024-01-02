<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\RentPoint;

class RentPointInfoComponent extends Component {
    public $rentPoint;

    public function __construct() {
        $this->rentPoint = RentPoint::where('id', 1)
                                    ->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {

        return view('components.rent-point-info-component', [
            'rentPointInfo' => $this->rentPoint->rentInfo,
        ]);
    }
}
