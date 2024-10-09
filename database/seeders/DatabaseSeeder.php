<?php

namespace Database\Seeders;

use App\Models\Difficulty;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Difficulty::create([
            'name' => 'Easy'
        ]);
        Difficulty::create([
            'name' => 'Medium'
        ]);
        Difficulty::create([
            'name' => 'Hard'
        ]);
        Difficulty::create([
            'name' => 'Insane'
        ]);
    }
}
