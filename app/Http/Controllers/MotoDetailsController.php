<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotoDetailsController extends Controller {
    public function details($id) {
        return view('details', [
            'id' => $id
        ]);
    }
}
