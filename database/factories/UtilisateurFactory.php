<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Langue;

class UtilisateurFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'mot_de_passe' => Hash::make('password'),
            'remember_token' => Str::random(10),

            'sexe' => $this->faker->randomElement(['M', 'F']),
            'date_naissance' => $this->faker->date(),
            'photo' => null,
            'statut' => 'actif',

            'role_id' => Role::inRandomOrder()->value('id') ?? 1,
            'langue_id' => Langue::inRandomOrder()->value('id') ?? 1,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
