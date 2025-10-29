<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Officer>
 */
class OfficerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $this->faker->name(),
            'rank' => $this->faker->randomElement(['Sergeant', 'Captain', 'Lieutenant', 'Detective']),
            'badge_number' => $this->faker->unique()->numerify('######'),
            'phone_number' => $this->faker->phoneNumber(),
            'station' => $this->faker->city() . ' Police Department',
        ];
    }
}