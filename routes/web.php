<?php

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/front.php';
require __DIR__.'/api.php';

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\Region;
use App\Models\Langue;
use Illuminate\Support\Facades\Auth;



Route::get('/admin/welcome', [DashboardController::class, 'index'])
->name('welcome')->middleware(['auth']);;

Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login');

Route::get('/', function () {

    $types = TypeContenu::all();
    $regions = Region::all();
    $langues = Langue::all();

    $user = Auth::user();

    return view('acceuil', compact('types', 'regions', 'langues', 'user'));
})->name('acceuil');

Route::get('/home', function () {
    $contenus=Contenu::all();

    return view('home', compact('contenus'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes

Route::get('/login', function(){ return view('login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');


Route::get('/register', function(){ return view('register'); })->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');



// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Paramètres
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

    // Aide & Support
    Route::get('/help', [HelpController::class, 'index'])->name('help.index');
    Route::get('/help/faq', [HelpController::class, 'faq'])->name('help.faq');
    Route::get('/help/contact', [HelpController::class, 'contact'])->name('help.contact');
    Route::post('/help/contact', [HelpController::class, 'sendMessage'])->name('help.send');

});

Route::get('/test-auth', function () {
    $user = App\Models\Utilisateur::where('email', 'roy.savy@culture.bj')->first();
    return [
        'exists' => $user !== null,
        'hash_ok' => Hash::check('Admin@culture@123', $user->mot_de_passe),
        'auth_password_method' => method_exists($user, 'getAuthPassword'),
    ];
});
