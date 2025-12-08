<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Commentaire, Contenu, User, Utilisateur};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Commentaire::class;

    public function definition(): array
    {
        return [
            'texte' => $this->faker->sentence(10),
            'note' => rand(1,5),
            'utilisateur_id' => Utilisateur::inRandomOrder()->value('id'),
            'contenu_id' => Contenu::inRandomOrder()->value('id'),
        ];
    }
}
