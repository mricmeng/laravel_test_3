<?php

namespace Database\Factories;

use App\Models\productModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<productModel>
 */
class productModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(15),
            'des' => $this->faker->text(70),
            'price' => $this->faker->numberBetween(200,1000),
            'qty' => $this->faker->numberBetween(6,20),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}