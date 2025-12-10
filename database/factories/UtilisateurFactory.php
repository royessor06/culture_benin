<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Langue;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
{
    public function definition(): array
    {
        $faker = FakerFactory::create(); // ✅ instanciation manuelle

        return [
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'mot_de_passe' => Hash::make('password'),
            'remember_token' => Str::random(10),

            'sexe' => $faker->randomElement(['M', 'F']),
            'date_naissance' => $faker->date(),
            'photo' => null,
            'statut' => 'actif',

            'role_id' => Role::inRandomOrder()->value('id') ?? 1,
            'langue_id' => Langue::inRandomOrder()->value('id') ?? 1,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
