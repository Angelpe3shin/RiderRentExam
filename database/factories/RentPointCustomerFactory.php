<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RentPointUser>
 */
class RentPointCustomerFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'rent_point_id' => \App\Models\RentPoint::factory(),
            'customer_id' => \App\Models\Customer::factory(),
        ];
    }
}
