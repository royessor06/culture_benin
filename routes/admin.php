<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenusController;
use App\Http\Controllers\LanguesController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\ModerateurController;
use App\Http\Controllers\ContributeurController;
use App\Http\Controllers\LecteurController;
use App\Http\Controllers\UtilisateurController;

// Route::prefix('admin')->group(function(){});

Route::resource('contenu', ContenusController::class);

Route::resource('langue', LanguesController::class);

Route::resource('region', RegionsController::class);

Route::resource('administrateur', AdministrateurController::class);

Route::resource('moderateur', ModerateurController::class);

Route::resource('contributeur', ContributeurController::class);

Route::resource('lecteur', LecteurController::class);

Route::resource('utilisateur', UtilisateurController::class);
