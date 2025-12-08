<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Langue;

class RegionLangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapping = [
            'Alibori' => ['Dendi','Peulh','Bariba'],
            'Atacora' => ['Ditammari','Lokpa','Bariba'],
            'Atlantique' => ['Fon','Xwla','Waci'],
            'Borgou' => ['Bariba','Baatonou','Dendi'],
            'Collines' => ['Yoruba','Mahi','Nagot'],
            'Couffo' => ['Adja','Fon'],
            'Donga' => ['Yoruba','Lokpa'],
            'Littoral' => ['Fon','Goun'],
            'Mono' => ['Xwla','Aizo','Adja'],
            'Ouémé' => ['Goun','Fon'],
            'Plateau' => ['Yoruba','Nagot'],
            'Zou' => ['Fon','Mahi'],
        ];
        foreach ($mapping as $regionNom => $langues) {
            $region = Region::where('nom', $regionNom)->first();
            foreach ($langues as $langNom) {
                $lang = Langue::where('nom', $langNom)->first();
                if ($region && $lang) {
                    $region->langues()->syncWithoutDetaching([$lang->id]);
                }
            }
        }
    }
}
