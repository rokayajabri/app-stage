<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $produits = [
            [
                'Produit_Ref' => 'DM24K5H22',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision Non SMART',

            ],
            [
                'Produit_Ref' => 'DM24DN119',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision Non SMART',
            ],
            [
                'Produit_Ref' => 'DM32DN119',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision Non SMART',
            ],
            [
                'Produit_Ref' => 'DM32DN119',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision Non SMART',
            ],
            [
                'Produit_Ref' => 'DM42DN100',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision Non SMART',
            ],
            [
                'Produit_Ref' => 'DM43DN100',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision Non SMART',
            ],
            [
                'Produit_Ref' => 'DM32DN119S [9]',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART Android',
            ],
            [
                'Produit_Ref' => 'DM40DN119S [9]',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART Android',
            ],
            [
                'Produit_Ref' => 'DM42DN100S [9]',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART Android',

            ],
            [
                'Produit_Ref' => 'DM43DN100S [9]',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART Android',

            ],
            [
                'Produit_Ref' => 'DM55DN100 [9]',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART Android',

            ],
            [
                'Produit_Ref' => 'DM65DK100 [9]',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART Android',

            ],
            [
                'Produit_Ref' => 'DM32P9H22S [11]',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART Android',

            ],
            [
                'Produit_Ref' => 'DM40A35AS [11]',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART Android',

            ],
            [
                'Produit_Ref' => 'DM43A35AS [11]',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART Android',

            ],
            [
                'Produit_Ref' => 'DM32A35EEVS',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART VIDAA',

            ],
            [
                'Produit_Ref' => 'DM40A35EEVS',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART VIDAA',

            ],
            [
                'Produit_Ref' => 'DM43V35KES',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART VIDAA',

            ],
            [
                'Produit_Ref' => 'DM50A53FEVS',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART VIDAA',

            ],
            [
                'Produit_Ref' => 'DM75V35KES',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART VIDAA',

            ],
            [
                'Produit_Ref' => 'DM55DE100S',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART WebOSTV',

            ],
            [
                'Produit_Ref' => 'DM65DK110S',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Télévision SMART WebOSTV',

            ],
            [
                'Produit_Ref' => 'Clé WiFi',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Accessoire Clé WiFi',

            ],
            [
                'Produit_Ref' => 'Télécommande',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Accessoire Télécommande',

            ],
            [
                'Produit_Ref' => 'LED Desplay',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Accessoire LED Desplay',

            ],
            [
                'Produit_Ref' => 'Estrella',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Récepteur Numérique Estrella',

            ],
            [
                'Produit_Ref' => 'A100',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Récepteur Numérique A100',

            ],
            [
                'Produit_Ref' => 'GX40',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Récepteur Numérique GX40',

            ],
            [
                'Produit_Ref' => 'Z9000',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Récepteur Numérique Z9000',

            ],
            [
                'Produit_Ref' => 'GES 80 HD',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Antenne Parabolique GES 80 HD',

            ],
            [
                'Produit_Ref' => 'GES 130 OF',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Antenne Parabolique GES 130 OF',

            ],
            [
                'Produit_Ref' => 'GES 150 P',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Antenne Parabolique GES 150 P',

            ],
            [
                'Produit_Ref' => 'BD-100Q',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Congélateur BD-100Q',

            ],
            [
                'Produit_Ref' => 'BD-138Q',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Congélateur BD-138Q',

            ],
            [
                'Produit_Ref' => 'BD-188Q',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Congélateur BD-188Q',

            ],
            [
                'Produit_Ref' => 'BD-238Q',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Congélateur BD-238Q',

            ],
            [
                'Produit_Ref' => 'BD-525Q',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Congélateur BD-525Q',

            ],
            [
                'Produit_Ref' => 'BD-725Q',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Congélateur BD-725Q',

            ],
            [
                'Produit_Ref' => 'XPB90-09SX1P',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Machine à Laver Semi Automatique',

            ],
            [
                'Produit_Ref' => 'XPB120-12SX1P',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Machine à Laver Semi Automatique',

            ],
            [
                'Produit_Ref' => 'DXQ70W-1202',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Machine à Laver Automatique',

            ],
            [
                'Produit_Ref' => 'DXQ70WC-1208',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Machine à Laver Automatique',

            ],
            [
                'Produit_Ref' => 'DXQ70SC-1208',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Machine à Laver Automatique',

            ],
            [
                'Produit_Ref' => 'DXQ80SC-1208',
                'Produit_cath' => \App\Models\Cathegories::factory(),
                'Produit_Description' => 'Machine à Laver Automatique',

            ],

        ];

         // Insérez les données dans la table Produits
         return $produits[array_rand($produits)];

    }
}
