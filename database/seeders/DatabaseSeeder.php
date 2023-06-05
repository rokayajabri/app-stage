<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //\App\Models\Zones::factory(5)->create();
         //\App\Models\Villes::factory(5)->create();
         //\App\Models\Clients::factory(5)->create();
         \App\Models\Cathegories::factory(5)->create();
         \App\Models\Produits::factory(5)->create();
    }
}
