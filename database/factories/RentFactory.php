<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rent>
 */
class RentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $startRentDate = $this->faker->dateTimeThisMonth();
        return [
            'customer_id' => \App\Models\Customer::factory(),
            'moto_id' => \App\Models\Moto::factory(),
            'discount_id' => \App\Models\Discount::factory(),
            'start_date' => $startRentDate,
            'requested_end_date' => $this->faker->dateTimeThisMonth($startRentDate),
            'actual_end_date' => $this->faker->optional(0.7)->dateTimeThisMonth($startRentDate),
            'total_requested_price' => $this->faker->randomFloat(2, 0, 1000),
            'total_actual_price' => $this->faker->randomFloat(2, 0, 1000),
            'is_active' => $this->faker->boolean,
        ];
    }
}
