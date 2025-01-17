<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'type' => 'admin',
        ]);
        $this->call([
            CitySeeder::class,
            IndustrySeeder::class,
            CategorySeeder::class,
            RecruiterSeeder::class,
            JobPostSeeder::class,
            JobApplicationSeeder::class,
        ]);
    }
}
