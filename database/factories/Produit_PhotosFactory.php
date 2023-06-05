<?php

namespace Database\Factories;

use App\Models\Produits;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit_Photos>
 */
class Produit_PhotosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Ph_Pr' => Produits::factory(),
            'Ph_Nom' => $this->faker->word(),
            'Ph_Image' => $this->faker->image('public/storage/images', 640, 480, null, false),
        ];
    }
}
