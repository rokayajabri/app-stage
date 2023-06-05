<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CathegoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $usedCategories = [];
    public function definition(): array
    {
        $categories = [
            [
                'Cath_Nom' => 'Accessoire',
                'Cath_Designation' => '',
            ],
            [
                'Cath_Nom' => 'Antenne Parabolique',
                'Cath_Designation' => '',
            ],
            [
                'Cath_Nom' => 'Television',
                'Cath_Designation' => 'Non SMART',
            ],
            [
                'Cath_Nom' => 'Television',
                'Cath_Designation' => 'SMART Android',
            ],
            [
                'Cath_Nom' => 'Television',
                'Cath_Designation' => 'SMART VIDAA',
            ],
            [
                'Cath_Nom' => 'Television',
                'Cath_Designation' => 'SMART WebOSTV',
            ],
            [
                'Cath_Nom' => 'Congélateur',
                'Cath_Designation' => '',
            ],
            [
                'Cath_Nom' => 'Machine à Laver',
                'Cath_Designation' => 'Semi Automatique',
            ],
            [
                'Cath_Nom' => 'Machine à Laver',
                'Cath_Designation' => 'Automatique',
            ],
            [
                'Cath_Nom' => 'Récepteur Numérique',
                'Cath_Designation' => '',
            ],
        ];

        $category = null;

        while (!$category) {
            // randomly select a category
            $selected = $categories[array_rand($categories)];

            // check if this category has already been returned
            if (!in_array($selected, $this->usedCategories)) {
                // mark this category as used
                $this->usedCategories[] = $selected;

                // set the selected category as the return value
                $category = $selected;
            }
        }

        return $category;

    }
}
