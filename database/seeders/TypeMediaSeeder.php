<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeMedia;

class TypeMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeMedia::insert([
            ['nom' => 'image'],
            ['nom' => 'audio'],
            ['nom' => 'video'],
        ]);
    }
}
