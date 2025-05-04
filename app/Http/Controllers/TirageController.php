<?php

namespace App\Http\Controllers;

use App\Models\Tontine;
use App\Models\Tirage;
use App\Models\User;
use Illuminate\Http\Request;

class TirageController extends Controller
{
    // Créer un tirage pour une tontine
    public function creerTirage($idTontine)
    {
        // Trouver la tontine à l'aide de l'id
        $tontine = Tontine::findOrFail($idTontine);

        // Récupérer les participants de la tontine (exemple : sélectionner un gagnant au hasard)
        $participants = $tontine->participants()->get();

        if ($participants->isEmpty()) {
            return redirect()->route('gerant.index')->with('error', 'Aucun participant pour cette tontine.');
        }

        // Sélectionner un gagnant au hasard parmi les participants
        $gagnant = $participants->random();

        // Créer un tirage
        $tirage = new Tirage();
        $tirage->idUser = $gagnant->id;
        $tirage->idTontine = $tontine->id;
        $tirage->dateTirage = now(); // La date du tirage est la date actuelle
        $tirage->save();

        return redirect()->route('gerant.index')->with('success', 'Tirage effectué avec succès !');
    }

    // Afficher les tirages d'une tontine
    public function afficherTirages($idTontine)
    {
        // Trouver la tontine
        $tontine = Tontine::findOrFail($idTontine);

        // Récupérer les tirages associés à cette tontine
        $tirages = $tontine->tirages;

        return view('gerant.afficher_tirages', compact('tirages', 'tontine'));
    }
}
