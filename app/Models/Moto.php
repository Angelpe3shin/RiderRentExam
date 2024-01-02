<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moto extends Model {
    use HasFactory;

    protected $table = 'motos';

    protected $fillable = [
        'moto_model_id',
        'color_id',
        'name',
        'production_year',
        'mileage',
        'base_rent_price',
        'base_rent_currency',
        'status',
    ];

    protected $casts = [
        'base_rent_price' => 'decimal:2',
    ];

    public function motoModel() {
        return $this->belongsTo(MotoModel::class, 'moto_model_id');
    }

    public function color() {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function isInBasketOf($user) {
        return $user->basketItems->contains('moto_id', $this->id);
    }
}
