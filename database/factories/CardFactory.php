<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pin' => fake()->word(),
            'certificate_expiration_date' => fake()->date(),
            'machine_name' => fake()->word(),
            'password' => Str::random(7),
            'last_access_date' => fake()->date(),
            'update_date' => fake()->date()
        ];
    }
}
