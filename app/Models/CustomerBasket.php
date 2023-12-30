<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBasket extends Model {
    use HasFactory;
    protected $table = 'customer_basket';

    protected $fillable = [
        'customer_id',
        'moto_id',
        'quantity',
        'status',
        'start_date',
        'end_date',
        'total_price',
        'total_price_currency',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function moto() {
        return $this->belongsTo(Moto::class);
    }
}
