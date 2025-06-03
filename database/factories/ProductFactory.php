<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->sentence,
            'slug' => str($name)->slug(),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100000, 500000),
        ];
    }
}
