<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RentPoint>
 */
class RentPointFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'address_id' => \App\Models\Address::factory(),
            'rent_points_conditions_id' => \App\Models\RentPointConditions::factory(),
            'rent_points_infos_id' => \App\Models\RentPointInfo::factory(),
            'point_name' => $this->faker->unique()->word,
            'payment_conditions' => $this->faker->sentence,
        ];
    }
}
