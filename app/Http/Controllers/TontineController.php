<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tontine;
use App\Models\Cotisation;
use App\Models\Tirage;
use Illuminate\Support\Facades\Auth;

class TontineController extends Controller
{
    // Afficher la liste des tontines auxquelles l'utilisateur participe
    public function participation()
    {
        $user = Auth::user();

        // Récupérer les tontines où l'utilisateur est inscrit
        $tontines = Tontine::whereHas('cotisations', function ($query) use ($user) {
            $query->where('idUser', $user->id);
        })->get();

        return view('tontines.participation', compact('tontines'));
    }

    // Gérer la cotisation
    public function cotiser(Request $request, Tontine $tontine)
    {
        $request->validate([
            'montant' => 'required|numeric|min:1',
            'moyen_paiement' => 'required|in:ESPECES,WAVE,OM'
        ]);

        Cotisation::create([
            'idUser' => Auth::id(),
            'idTontine' => $tontine->id,
            'montant' => $request->montant,
            'moyen_paiement' => $request->moyen_paiement
        ]);

        return redirect()->back()->with('success', 'Cotisation effectuée avec succès !');
    }
}

