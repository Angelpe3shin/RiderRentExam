<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPointInfo extends Model {
    use HasFactory;

    protected $table = 'rent_points_infos';

    protected $fillable = [
        'main_img_url',
        'info',
    ];
}
