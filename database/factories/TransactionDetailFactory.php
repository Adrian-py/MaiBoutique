<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $products = Product::pluck('id')->toArray();
        return [
            'transaction_id' => $this->faker->unique()->numberBetween(1, Transaction::count()),
            'product_id' => $this->faker->randomElement($products),
            'quantity' => $this->faker->randomDigitNotNull(),
        ];
    }
}
