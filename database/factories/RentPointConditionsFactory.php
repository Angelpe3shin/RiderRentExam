<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RentPointConditions>
 */
class RentPointConditionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'rules' => $this->faker->paragraph,
            'prohibitions' => $this->faker->paragraph,
            'responsibilities' => $this->faker->paragraph,
        ];
    }
}
