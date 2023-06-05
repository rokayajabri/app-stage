<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Techniciens>
 */
class TechniciensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Tech_Name'=> $this->faker->name(),
            'Tech_Note'=> $this->faker->sentence(),
        ];
    }
}
