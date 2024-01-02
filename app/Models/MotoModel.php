<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotoModel extends Model {
    use HasFactory;
    protected $table = 'moto_models';

    protected $fillable = [
        'brand_id',
        'engine_id',
        'name',
        'release_start_year',
        'release_end_year',
        'weight',
        'description',
        'image_url',
        'price',
        'price_currency',
        'fuel_tank_capacity',
        'fuel_tank_capacity_type',
        'max_speed',
        'type',
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function engine() {
        return $this->belongsTo(Engine::class);
    }
}
