<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPoint extends Model {
    use HasFactory;

    protected $table = 'rent_points';

    protected $fillable = [
        'address_id',
        'point_name',
    ];

    public function address() {
        return $this->belongsTo(Address::class);
    }
}
