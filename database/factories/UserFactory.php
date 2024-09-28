<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),                   // Genera un nombre aleatorio
            'email' => $this->faker->unique()->safeEmail(),   // Genera un email único y seguro
            'email_verified_at' => now(),                       // Marca el email como verificado
            'password' => Hash::make('password'),               // Contraseña encriptada
            'remember_token' => Str::random(10),               // Token de recuerdo
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,                       // Marca el email como no verificado
        ]);
    }
}

