<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class CustomerBasketFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $moto = \App\Models\Moto::factory()->create(); // Уберите create() здесь

        $startDate = $this->faker->dateTimeThisMonth();
        $endDate = $this->faker->dateTimeThisMonth($startDate);

        // Use Carbon to calculate the difference in days
        $rentalDays = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate));

        $totalRentalPrice = $moto->base_rent_price * $rentalDays;

        return [
            'customer_id' => \App\Models\Customer::factory(),
            'moto_id' => $moto->id, // Уберите create() здесь
            'quantity' => 1,
            'status' => $this->faker->randomElement(['pendingTransaction', 'paymentFinished', 'removedWithoutFinish']),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_price' => $totalRentalPrice,
            'total_price_currency' => $moto->base_rent_currency, // Уберите create() здесь
        ];
    }
}
