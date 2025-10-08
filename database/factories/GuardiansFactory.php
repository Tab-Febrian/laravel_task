<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardians>
 */
class GuardiansFactory extends Factory
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
            'job'=>fake()->randomElement(['Wiraswasta', 'Guru', 'Karyawan', 'Polisi']),
            'phone'=>fake()->phoneNumber(),
            'email'=>fake()->unique()->safeEmail(),
            'address'=>fake()->address(),
        ];
    }
}
