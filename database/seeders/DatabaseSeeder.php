<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SOR;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SorTypesSeeder::class,
            IncidentSeeder::class,
        ]);

        \App\Models\User::factory(30)->create();
        \App\Models\SOR::factory(200)->create();
        \App\Models\Incident::factory(200)->create();
        \App\Models\Icas::factory(80)->create();
        \App\Models\Task::factory(80)->create();
        \App\Models\Permit::factory(50)->create();

    }
}
