<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\movie>
 */
class movieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->words(2, true),
            "year" => fake()->randomNumber(4, true),
            "cashOut" => fake()->numberBetween(10, 500)
        ];
    }
}