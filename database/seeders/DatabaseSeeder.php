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
        $this->call(InitialUserSeeder::class);
        \App\Models\Website::factory(5)->create();
        // \App\Models\User::factory(10)->create();
    }
}
