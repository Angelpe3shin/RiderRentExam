<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'customers';

    protected $fillable = [
        'address_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];

    public function address() {
        return $this->belongsTo(Address::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function rentPoints() {
        return $this->belongsToMany(RentPoint::class, 'RentPointCustomers', 'customer_id', 'point_id');
    }

    public function rents() {
        return $this->hasMany(Rent::class);
    }

    public function basketItems() {
        return $this->hasMany(CustomerBasket::class, 'customer_id');
    }
}
