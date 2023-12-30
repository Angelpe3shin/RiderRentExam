<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RentPointRent>
 */
class RentPointRentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'rent_point_id' => \App\Models\RentPoint::factory(),
            'rent_id' => \App\Models\Rent::factory(),
        ];
    }
}
