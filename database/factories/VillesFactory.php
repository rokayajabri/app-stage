<?php

namespace Database\Factories;

use App\Models\Zones;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Villes>
 */
class VillesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Ville_Nom' => $this->faker->city(),
            'Ville_Zone' => Zones::factory(),
        ];
    }
}
