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

Route::resource('user', AuthController::class)->names([
    'index' => 'user.index',
    'create' => 'user.create',
    'show'=> 'user.show',
    'edit' => 'user.edit',
    'update' => 'user.update'
]);

//
Route::get('/create-admin',[AuthController::class, 'createAdmin']);
// Authentification

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards pour chaque type d'utilisateur
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

Route::get('/admin/add-user', function(){
    return view('admin.addUser');
});

Route::post('/admin/add-user',[AuthController::class, 'addUser'])->name('addUser');

Route::get('/utilisateur/dashboard', function () {
    return view('utilisateur.dashboard');
})->middleware(['auth'])->name('utilisateur.dashboard');
