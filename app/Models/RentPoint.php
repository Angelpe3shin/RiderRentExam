<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPoint extends Model {
    use HasFactory;

    protected $table = 'rent_points';

    protected $fillable = [
        'address_id',
        'rent_points_conditions_id',
        'rent_points_infos_id',
        'point_name',
        'payment_conditions',
    ];

    public function address() {
        return $this->belongsTo(Address::class);
    }

    public function rentConditions() {
        return $this->belongsTo(RentPointConditions::class, 'rent_points_conditions_id');
    }

    public function rentInfo() {
        return $this->belongsTo(RentPointInfo::class, 'rent_points_infos_id');
    }
}
