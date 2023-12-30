<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Engine>
 */
class EngineFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'name' => $this->faker->word,
            'production_start_year' => $this->faker->year,
            'production_end_year' => $this->faker->year,
            'capacity' => $this->faker->randomFloat(2, 500, 5000),
            'fuel_type' => $this->faker->randomElement(['petrol', 'diesel', 'electro', 'hybrid']),
        ];
    }
}
