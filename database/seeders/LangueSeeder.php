<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Langue;

class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langues = [
            ['nom' => 'Fon', 'code' => 'fon'],
            ['nom' => 'Yoruba', 'code' => 'yor'],
            ['nom' => 'Goun', 'code' => 'gun'],
            ['nom' => 'Dendi', 'code' => 'den'],
            ['nom' => 'Adja', 'code' => 'adj'],
            ['nom' => 'Baatonou', 'code' => 'baa'],
            ['nom' => 'Bariba', 'code' => 'bar'],
            ['nom' => 'Ditammari', 'code' => 'dit'],
            ['nom' => 'Lokpa', 'code' => 'lok'],
            ['nom' => 'Mahi', 'code' => 'mah'],
            ['nom' => 'Nagot', 'code' => 'nag'],
            ['nom' => 'Peulh', 'code' => 'pul'],
            ['nom' => 'Waci', 'code' => 'wac'],
            ['nom' => 'Xwla', 'code' => 'xwl'],
            ['nom' => 'Aizo', 'code' => 'aiz'],
        ];
        Langue::insert($langues);
    }
}
