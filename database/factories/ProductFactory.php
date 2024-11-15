<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'category_id' => Category::factory(),
            'status' => true,
            'price' => fake()->numberBetween(1000, 2000),
            'thumbnail' => 'path/to/file.jpg'
        ];
    }
}
