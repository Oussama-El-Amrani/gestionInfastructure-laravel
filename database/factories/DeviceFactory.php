<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *z
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Str::random(5),
            'location' => Str::random(10),
            'state' => fake()->boolean(),
            'date_taken' => fake()->date(),
            'date_delivery' => fake()->date(),
            'comment' => fake()->text(),
            // 'user_full_name' => fake()->name()
        ];
    }
}
