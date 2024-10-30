<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSize>
 */
class ProductSizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL', 'XXL']),
            'product_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
