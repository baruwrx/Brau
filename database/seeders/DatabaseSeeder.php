<?php

namespace Database\Seeders;

use App\User; 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(50)->create();

        User::factory()->create([
            'name' => 'Brau',
            'email' => 'Brau@gmail.com',
        ]);
    }
}

