<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPointRent extends Model {
    use HasFactory;
    protected $table = 'rent_point_rent';

    protected $fillable = [
        'rent_point_id',
        'rent_id',
    ];

    public function rentPoint() {
        return $this->belongsTo(RentPoint::class);
    }

    public function rent() {
        return $this->belongsTo(Rent::class);
    }
}
