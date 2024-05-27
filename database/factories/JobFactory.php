<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    
            'title' => fake()->jobTitle(),
            'employer_id' => User::factory(), //multiple job listing belongs to the same employer, recycle
            'annual_salary' => '$100,000',
            'integer_salary_for_testing' => fake()->numberBetween(1000, 10000),
        ];
    }
}
