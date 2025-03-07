<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredicationController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajout', function () {
    return view('predication.create');
});

// Routes des predications
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/predications', [PredicationController::class, 'index']); // Liste des prédications
//     Route::post('/predications', [PredicationController::class, 'store']); // Ajouter une prédication
//     Route::get('/predications/{id}', [PredicationController::class, 'show']); // Voir une prédication
//     Route::put('/predications/{id}', [PredicationController::class, 'update']); // Modifier une prédication
//     Route::delete('/predications/{id}', [PredicationController::class, 'destroy']); // Supprimer une prédication
// });

Route::resource('predication', PredicationController::class)->names([
    'index' => 'predication.index',
    'create' => 'predication.create',
    'show'=> 'predication.show',
    'edit' => 'predication.edit',
    'update' => 'predication.update'
]);



// Authentification

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards pour chaque type d'utilisateur
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

Route::get('/pasteur/dashboard', function () {
    return view('pasteur.dashboard');
})->middleware(['auth'])->name('pasteur.dashboard');

Route::get('/fidele/dashboard', function () {
    return view('fidele.dashboard');
})->middleware(['auth'])->name('fidele.dashboard');

// L'inscription --------------
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);