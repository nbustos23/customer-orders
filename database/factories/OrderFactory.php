<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

class OrderFactory extends Factory {
    protected $model = \App\Models\Order::class;

    public function definition() {
        return [
            'customer_id' => Customer::factory(),
            'product_name' => $this->faker->word,
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 5, 200),
        ];
    }
}
