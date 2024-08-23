<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuti>
 */
class CutiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // dd(Employee::inRandomOrder()->first());
        return [
            'nomor_induk_id' => Employee::inRandomOrder()->first()->nomor_induk,
            'tanggal_cuti' => $this->faker->date(),
            'lama_cuti' => rand(1, 12),
            'keterangan' => $this->faker->sentence,
        ];
    }
}
