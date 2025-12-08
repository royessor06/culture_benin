<?php

use Illuminate\Support\Facades\Route;
use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\Region;
use App\Models\Langue;
use App\Http\Middleware\CheckRole;

Route::get('/admin/welcome', function (){
    return view('welcome');
})->name('welcome')->middleware(['auth']);

Route::get('/moderateur/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth']);

Route::get('/contenus/{nom}', function ($nom) {
    $types = TypeContenu::all();
    $regions = Region::all();
    $langues = Langue::all();

    // Vérifier que le type existe
    $type = TypeContenu::where('nom', $nom)->firstOrFail();

    // Charger les contenus
    $contenus = Contenu::where('type_contenu_id', $type->id)
        ->with(['auteur', 'medias', 'commentaires'])
        ->get();

    return view('pages.contenus', compact('type', 'contenus', 'types', 'regions', 'langues'));

})->name('contenus.type');
