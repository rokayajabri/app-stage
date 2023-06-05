<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit_Etat_Reparation>
 */
class Produit_Etat_ReparationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'EtatReparation_Ref'=> $this->faker->name(),
            'EtatReparation_Description'=> $this->faker->sentence(),
        ];
    }
}
