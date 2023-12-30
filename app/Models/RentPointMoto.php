<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPointMoto extends Model {
    use HasFactory;
    protected $table = 'rent_point_moto';

    protected $fillable = [
        'rent_point_id',
        'moto_id',
    ];

    public function rentPoint() {
        return $this->belongsTo(RentPoint::class);
    }

    public function moto() {
        return $this->belongsTo(Moto::class);
    }
}
