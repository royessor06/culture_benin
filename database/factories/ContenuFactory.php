<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Contenu, Region, Langue, TypeContenu, Utilisateur};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contenu>
 */
class ContenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Contenu::class;

    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(),
            'texte' => $this->faker->paragraph(5),
            'region_id' => Region::inRandomOrder()->value('id'),
            'langue_id' => Langue::inRandomOrder()->value('id'),
            'type_contenu_id' => TypeContenu::inRandomOrder()->value('id'),
            'auteur_id' => Utilisateur::inRandomOrder()->value('id'),
            'statut' => 'publie',
            'date_validation' => now(),
        ];
    }
}
