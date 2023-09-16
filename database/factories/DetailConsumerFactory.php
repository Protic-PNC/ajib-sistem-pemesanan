<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailConsumer>
 */
class DetailConsumerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_name' => fake()->company(),
            'branch_id' => fake()->randomNumber(),
            'kabupaten' => fake()->word(),
            'kecamatan' => fake()->word(),
            'kelurahan' => fake()->word(),
            'rt' => fake()->randomNumber(),
            'rw' => fake()->randomNumber(),
            'alamat' => fake()->address(),
            'kode_pos' => intval(fake()->postcode()),
            'no_hp' => fake()->e164PhoneNumber(),
            'foto_rumah' => fake()->imageUrl(),
        ];
    }
}
