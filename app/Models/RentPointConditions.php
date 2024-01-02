<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPointConditions extends Model {
    use HasFactory;

    protected $table = 'rent_points_conditions';

    protected $fillable = [
        'rules',
        'prohibitions',
        'responsibilities',
    ];
}
