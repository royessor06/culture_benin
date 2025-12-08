<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeContenu;

class TypeContenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeContenu::insert([
            ['nom' => 'histoire'],
            ['nom' => 'recette'],
            ['nom' => 'article'],
        ]);
    }
}
