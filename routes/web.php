<?php

use App\Http\Controllers\inscriptionController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MotdePasseController;
use App\Http\Controllers\TontineController;
use Illuminate\Support\Facades\Route;

Route::get('/', [inscriptionController::class, 'home'])->name('home');
// page inscription
Route::get('register', [inscriptionController::class, 'index'])->name('inscription.index');
Route::post('validate-register', [inscriptionController::class, 'register'])->name('inscription.register');

// page de connexion
Route::get('connexion', [loginController::class, 'connexion'])->name('connexion.conexion');
Route::post('validate-connexion', [loginController::class, 'auth'])->name('connexion.valider');

// page de changer le mot de passe
Route::get('changer', [MotdePasseController::class, 'changer'])->name('mots_de_passe_oblier.changer');
Route::post('validate-mots_de_passe_oblier', [MotdePasseController::class, 'auth'])->name('mots_de_passe_oblier.mod');

// page pour afficher la liste des participants
Route::get('affichageListe', [TontineController::class, 'affichageListe'])->name('contenue.affichage');
