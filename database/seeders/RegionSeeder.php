<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['nom' => 'Alibori'],
            ['nom' => 'Atacora'],
            ['nom' => 'Atlantique'],
            ['nom' => 'Borgou'],
            ['nom' => 'Collines'],
            ['nom' => 'Couffo'],
            ['nom' => 'Donga'],
            ['nom' => 'Littoral'],
            ['nom' => 'Mono'],
            ['nom' => 'Ouémé'],
            ['nom' => 'Plateau'],
            ['nom' => 'Zou'],
        ];
        Region::insert($regions);
    }
}
