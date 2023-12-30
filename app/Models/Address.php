<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'country_id',
        'street',
        'house_number',
        'zip_code',
        'city',
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    }
}
