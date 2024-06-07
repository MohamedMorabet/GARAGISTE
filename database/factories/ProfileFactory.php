<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'adress'=> fake()->address(),
            'phone'=> fake()->phoneNumber(),
            'email'=>fake()->unique()->safeEmail(),
            'password'=> Hash::make('123456789'),
            'role'=> fake()->randomElement(['client', 'mechanical']),
        ];
    }
}
