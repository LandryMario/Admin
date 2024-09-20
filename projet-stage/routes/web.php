<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Use App\Http\Controllers\UserController;
Use App\Http\Controllers\UtilisateurController;

Route::get('/', function () {
    return view('welcome');
    // return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/page', function () {
    return view('page');
})->middleware(['auth', 'verified'])->name('page');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/******************** création utilisateur************************/
Route::get('/nouveau',[UtilisateurController::class,'utilisateur']);
Route::post('/ajouter',[UtilisateurController::class,'ajout']);
Route::get('/dashboard', [UtilisateurController::class, 'dashboard'])->name('dashboard');
Route::post('/modifier',[UtilisateurController::class,'modifications']);
Route::get('/affichagemodifications/{id?}',[UtilisateurController::class,'dashboardmod']);
Route::get('/pdf', [UtilisateurController::class,'impression']);
Route::get('/suppression/{id}',[UtilisateurController::class,'supprimer'])->name('suppression');

/**********************statistique*********************************/
Route::get('/page', [UtilisateurController::class,'page'])->name('page');












require __DIR__.'/auth.php';
