<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Change_Statut>
 */
class Change_StatutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ChangeStatut_Ref' => $this->faker->randomElement(['Yes', 'No']),
            'ChangeStatut_Description'=> $this->faker->sentence(),
        ];
    }
}
