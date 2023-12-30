<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

use app\Models\Brand;
use app\Models\Engine;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MotoModel>
 */
class MotoModelFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'brand_id' => Brand::factory(),
            'engine_id' => Engine::factory(),
            'name' => $this->faker->word,
            'release_start_year' => $this->faker->year,
            'release_end_year' => $this->faker->year,
            'weight' => $this->faker->numberBetween(100, 500),
            'description' => $this->faker->sentence,
            'image_url' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 1000, 10000),
            'price_currency' => $this->faker->currencyCode,
            'fuel_tank_capacity' => $this->faker->numberBetween(1, 10),
            'fuel_tank_capacity_type' => $this->faker->randomElement(['l', 'kW']),
            'max_speed' => $this->faker->numberBetween(80, 300),
            'type' => $this->faker->randomElement(['Street', 'Cruiser', 'Sport', 'Touring', 'Enduro', 'Chopper', 'Adventure', 'Scooter', 'Electric']),
        ];
    }
}
