<?php

namespace Database\Factories;

use App\Models\BonReception;
use App\Models\Change_Statut;
use App\Models\Detail_Br;
use App\Models\Produit_Etat_ES;
use App\Models\Produit_Etat_Reparation;
use App\Models\Produits;
use App\Models\Techniciens;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail_Br>
 */
class Detail_BrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $count = Detail_Br::count();
        return [
            'dBR_BR'=>BonReception::factory(),
            'dBR_Produit'=>Produits::factory(),
            'dBR_SN' => $this->faker->numberBetween(0, 100),
            'dBR_Problem' => $this->faker->sentence(),
            'dBR_Etat_Reparation'=>Produit_Etat_Reparation::factory(),
            'dBR_ChangeStatut'=>Change_Statut::factory(),
            'dBR_Garantie'=> $this->faker->randomElement(['Yes', 'No']),
            'dBR_RepairDetail'=> $this->faker->sentence(),
            'dBR_Accessoires'=> $this->faker->name(),
            'dBR_Technicien'=>Techniciens::factory(),
            'dBR_Photo'=> $this->faker->imageUrl(),
            'dBR_Note'=> $this->faker->sentence(),
        ];
    }
}
