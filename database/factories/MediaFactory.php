<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Media, Contenu, TypeMedia};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Media::class;

    public function definition(): array
    {
        return [
            'chemin' => 'uploads/' . $this->faker->word() . '.jpg',
            'description' => $this->faker->sentence(),
            'contenu_id' => Contenu::inRandomOrder()->value('id'),
            'type_media_id' => TypeMedia::inRandomOrder()->value('id'),
        ];
    }
}
