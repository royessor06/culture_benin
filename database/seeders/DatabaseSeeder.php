<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Contenu, Media, Commentaire, Utilisateur};

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleSeeder::class,
            TypeMediaSeeder::class,
            TypeContenuSeeder::class,
            LangueSeeder::class,
            RegionSeeder::class,
            RegionLangueSeeder::class,
        ]);

        Utilisateur::factory()->create([
            'nom' => 'SAVY',
            'prenom' => 'Roy',
            'email' => 'roy.savy@culture.bj',
            'mot_de_passe' => bcrypt('Admin@culture@123'),
            'role_id' => 1,
            'langue_id' => 1,
        ]);

        Contenu::factory(30)->create();
        Media::factory(40)->create();
        Commentaire::factory(60)->create();
        Utilisateur::factory(20)->create();
    }
}
