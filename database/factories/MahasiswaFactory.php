<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->unique()->regexify('[M][0][5][2][1][0][0-9][1-9]'),
            'kelas' => fake()->randomElement(['A', 'B', 'C']),
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
        ];
    }
}
