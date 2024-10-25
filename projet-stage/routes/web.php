<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Use App\Http\Controllers\UserController;
Use App\Http\Controllers\UtilisateurController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', [HomeController::class, 'liste'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/page', function () {
    return view('page');
})->middleware(['auth', 'verified'])->name('page');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/******************** création utilisateur************************/
Route::get('/nouveau',[UtilisateurController::class,'index']);

Route::post('/ajouter',[UtilisateurController::class,'ajout'])->name('nouveau');

Route::get('/editPage/{id}', [UtilisateurController::class, 'editPage'])->name('editPage');

Route::post('/edit', [UtilisateurController::class, 'edit'])->name('modification');

Route::delete('/utilisateur/{id}', [UtilisateurController::class, 'destroy'])->name('utilisateur.destroy');

Route::get('/affichagemodifications/{id?}',[UtilisateurController::class,'dashboardmod']);
Route::get('/pdf', [UtilisateurController::class,'impression']);

/**********************statistique*********************************/
Route::get('/page', [UtilisateurController::class,'page'])->name('page');

Route::get('/unauthorized', function () {
    return view('unauthorized'); // Crée la vue correspondante
});












require __DIR__.'/auth.php';
