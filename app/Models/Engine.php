<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model {
    use HasFactory;
    protected $table = 'engines';

    protected $fillable = [
        'name',
        'production_start_year',
        'production_end_year',
        'capacity',
        'fuel_type',
    ];
}
