<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPointCustomer extends Model {
    use HasFactory;
    protected $table = 'rent_point_customer';

    protected $fillable = [
        'rent_point_id',
        'customer_id',
    ];

    public function rentPoint() {
        return $this->belongsTo(RentPoint::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
