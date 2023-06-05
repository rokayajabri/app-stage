<?php

namespace Database\Factories;

use App\Models\BonReception;
use App\Models\Clients;
use App\Models\Transports;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BonReception>
 */
class BonReceptionFactory extends Factory
{
    protected $model = BonReception::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $count = BonReception::count();
        return [
            'BR_Date'=> now()->format('Y-m-d'),
            'BR_Client'=> Clients::factory(),
            'BR_Qte' => $this->faker->numberBetween(1, 100),
            'BR_Transporte'=>Transports::factory(),
            'BR_Note'=>$this->faker->text(100),
            'BR_NoDocument'=>$this->faker->unique()->numberBetween(1000, 9999),
        ];
    }
}
