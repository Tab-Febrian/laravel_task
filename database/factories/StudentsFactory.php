<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
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
            'birthday'=>fake()->date(),
            // 'grade'=>fake()->randomElement(['10 RPL 1', '10 RPL 2', '10 RPL 3', '11 RPL 1', '11 RPL 2']),
            'classroom_id'=>Classroom::factory(),
            'email'=>fake()->unique()->safeEmail()  ,
            'address'=>fake()->address(),
        ];
    }
}
