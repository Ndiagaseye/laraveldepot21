<?php

use App\Http\Controllers\inscriptionController;
use App\Http\Controllers\TirageController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MotdePasseController;
use App\Http\Controllers\TontineController;
use App\Http\Controllers\GerantController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;





Route::get('gerant', [GerantController::class, 'index'])->name('gerant.index');

// Page d'accueil du site
Route::get('/', [inscriptionController::class, 'home'])->name('home');

// Route vers la page des participants, liée à une méthode participantHome
Route::get('participant', [inscriptionController::class, 'participantHome'])->name('page.perticipant.participant');

// ** Routes d'inscription **

// Page d'inscription (affiche le formulaire d'inscription)
Route::get('register', [inscriptionController::class, 'index'])->name('inscription.index');
// Route pour valider et enregistrer un utilisateur (envoie les données du formulaire d'inscription)
Route::post('validate-register', [inscriptionController::class, 'register'])->name('inscription.register');

// ** Routes de connexion **

// Page de connexion (affiche le formulaire de connexion)
Route::get('connexion', [loginController::class, 'connexion'])->name('connexion.conexion');
// Route pour valider et authentifier un utilisateur (envoie les informations du formulaire de connexion)
Route::post('validate-connexion', [loginController::class, 'auth'])->name('connexion.valider');

// ** Routes de gestion du mot de passe **

// Page pour changer le mot de passe
Route::get('changer', [MotdePasseController::class, 'changer'])->name('mots_de_passe_oblier.changer');
// Route pour valider et modifier le mot de passe
Route::post('validate-mots_de_passe_oblier', [MotdePasseController::class, 'auth'])->name('mots_de_passe_oblier.mod');

// ** Routes liées aux tontines **

// Route pour afficher la liste des participants à une tontine
Route::get('affichageListe', [TontineController::class, 'affichageListe'])->name('contenue.affichage');

// ** Routes des participants authentifiés **
Route::get('/gerant/tontine/create', [GerantController::class, 'create'])->name('gerant.create');
Route::get('/gerant/historique', [GerantController::class, 'historique'])->name('gerant.historique');
Route::post('/gerant/tontine', [GerantController::class, 'store'])->name('gerant.store');
// Route pour supprimer une tontine
Route::delete('/gerant/tontine/{id}', [GerantController::class, 'destroy'])->name('gerant.delete');


// Ce groupe de routes est accessible uniquement si l'utilisateur est authentifié
Route::middleware(['auth'])->group(function () {
    // Route pour afficher les tontines auxquelles l'utilisateur participe
    Route::get('/tontines/participation', [TontineController::class, 'participation'])->name('tontines.participation');
    // Route pour permettre à l'utilisateur de cotiser à une tontine
    Route::post('/tontines/cotiser/{tontine}', [TontineController::class, 'cotiser'])->name('tontines.cotiser');
});

// Routes du Gérant (Ajout des participants aux tontines)
Route::middleware(['auth', 'role:gerant'])->group(function () {
    // Route pour afficher le tableau de bord du gérant
    // Route::get('/gerant/dashboard', [GerantController::class, 'enregistrerParticipant'])->name('gerant.dashboard');

    // Route pour ajouter un participant à une tontine spécifique
    Route::get('/gerant/tontine/{id}/participants', [GerantController::class, 'ajouterParticipant'])->name('gerant.ajouterParticipant');
    // Route pour enregistrer les participants ajoutés à une tontine
    Route::post('/gerant/tontine/{id}/participants', [GerantController::class, 'enregistrerParticipant'])->name('gerant.enregistrerParticipant');
    // Route pour afficher les tirages d'une tontine
    Route::get('/gerant/tontine/{id}/tirages', action: [TirageController::class, 'afficherTirages'])->name('gerant.afficherTirages');
    // Route pour créer un tirage pour une tontine
    Route::post('/gerant/tontine/{id}/creer-tirage', [TirageController::class, 'creerTirage'])->name('gerant.creerTirage');
});

// Routes du Participant
Route::middleware(['auth', 'role:participant'])->group(function () {
    // Route pour afficher le tableau de bord du participant
    Route::get('/participant/dashboard', [ParticipantController::class, 'dashboard'])->name('participant.dashboard');
    // Autres routes spécifiques aux participants
});
