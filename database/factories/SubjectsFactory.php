<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subjects>
 */
class SubjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->unique()->randomElement(['Bahasa Indonesia', 'Bahasa Inggris', 'Pendidikan Pancasila', 'Ilmu Pengetahuan Sosial', 'Ilmu Pengetahuan Alam']),
            'description'=>fake()->sentence(),
        ];
    }
}
