<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = [
            "name" => $this->faker->numerify("Shirt-##"),
            "price" => $this->faker->numberBetween(50000, 10000000),
            "description" => $this->faker->text(),
            "image" => "shirt-" . rand(1, 3) . ".jpg",
        ];

        $product["slug"] = Str::slug($product["name"]);

        return $product;
    }
}
