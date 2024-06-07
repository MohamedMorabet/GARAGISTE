<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            MechanicalSeeder::class,
        );
        $this->call(
            ProfileSeeder::class, true  // Pass true as the second argument;
        );
    }
}
