<?php

namespace Database\Factories;

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
        return [
            "name" => $this->faker->numerify("Shirt-##"),
            "price" => $this->faker->numberBetween(50000, 10000000),
            "description" => $this->faker->text(),
            "image" => "temp.jpeg",
        ];
    }
}
