<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// ! when you want to test and have factory to generate records for you
// ! for wipping up your local inviroment.

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        //! App\Models\User::factory()->create();
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            // 'admin' => false,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    //! you can activate this state
    //! App\Models\User::factory()->unverified()->create();
    public function unverified(): static//eposide 10 minit 1
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
    //! App\Models\User::factory()->admin()->create();
    // public function admin(): static//eposide 10 minit 1
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'admin' => true,
    //     ]);
    // }
}
