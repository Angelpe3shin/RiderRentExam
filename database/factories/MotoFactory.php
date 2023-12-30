<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

use app\Models\MotoModel;
use app\Models\Color;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Moto>
 */
class MotoFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'moto_model_id' => MotoModel::factory(),
            'color_id' => Color::factory(),
            'name' => $this->faker->word,
            'production_year' => $this->faker->numberBetween(2000, 2023),
            'mileage' => $this->faker->randomFloat(2, 0, 100000),
            'base_rent_price' => $this->faker->randomFloat(2, 50, 500),
            'base_rent_currency' => $this->faker->currencyCode,
            'status' => $this->faker->randomElement(['free', 'occupied', 'unavailable']),
            'created_at' => now(),
        ];
    }
}
