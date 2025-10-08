<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subjects;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teachers>
 */
class TeachersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'subject_id'=>Subjects::factory(),
            'email'=>fake()->unique()->safeEmail(),
            'phone'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
        ];
    }
}
