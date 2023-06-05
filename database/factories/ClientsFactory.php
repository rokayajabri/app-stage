<?php

namespace Database\Factories;

use App\Models\Villes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clients>
 */
class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Client_Principale' => $this->faker->name(),
            'Client_Societe' => $this->faker->company(),
            'Client_Ville' => Villes::factory(),
            'Client_Tel' => $this->faker->phoneNumber(),
            'Client_Emails' => $this->faker->email(),
            'Client_Note' => $this->faker->sentence(),
        ];
    }
}
