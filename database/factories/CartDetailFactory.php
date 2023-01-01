<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartDetailFactory extends Factory
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
            'cart_id' => 1,
            'product_id' => $this->faker->randomElement($products),
            'quantity' => $this->faker->randomDigitNotNull(),
        ];
    }
}
