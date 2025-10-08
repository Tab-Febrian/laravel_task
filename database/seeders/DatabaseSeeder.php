<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Students;
use App\Models\Guardians;
use App\Models\Classroom;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Classroom::factory(5)->hasStudents(5)->create();
        // Students::factory(10)->create();
        Guardians::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
        