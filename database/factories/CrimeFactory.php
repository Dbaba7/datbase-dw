<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crime>
 */
class CrimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'crime_type' => $this->faker->randomElement(['robbery', 'burglary', 'assault', 'theft']),
            'description' => $this->faker->sentence(),
            'location' => 'new york',
            'reported_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status' => $this->faker->randomElement(['reported', 'under_investigation', 'resolved', 'closed']),
        ];
    }
}