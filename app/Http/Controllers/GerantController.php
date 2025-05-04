<?php

namespace App\Http\Controllers;

use App\Models\Tontine;
use App\Models\User;
use Illuminate\Http\Request;

class GerantController extends Controller
{
    public function index()
{
    $tontines = Tontine::all();
    return view('page.gerant.index', compact('tontines'));
}

    // Afficher le formulaire pour ajouter des participants à une tontine
    public function ajouterParticipant($idTontine)
    {
        $tontine = Tontine::findOrFail($idTontine);

        // Récupérer les utilisateurs qui ne participent pas encore à cette tontine
        $participants = User::whereDoesntHave('tontines', function ($query) use ($idTontine) {
            $query->where('idTontine', $idTontine);
        })->get();

        return view('page.gerant.create', compact('tontine', 'participants'));
    }
    public function create()
    {
        return view('page.gerant.create'); //
    }

    // Enregistrer les participants dans la tontine
    public function enregistrerParticipant(Request $request, $idTontine)
    {
        $request->validate([
            'participants' => 'required|array',
        ]);

        $tontine = Tontine::findOrFail($idTontine);
        $tontine->participants()->attach($request->participants);

        return redirect()->route('gerant.tontines')->with('success', 'Participants ajoutés avec succès !');
    }

public function store(Request $request)
{
    $request->validate([
        'libelle' => 'required|string|max:255',
        'description' => 'nullable|string',
        'frequence' => 'required|string',
        // Ajoute d'autres champs si nécessaire
    ]);

    Tontine::create([
        'libelle' => $request->libelle,
        'description' => $request->description,
        'frequence' => $request->frequence,
    ]);

    return redirect()->route('gerant.index')->with('success', 'Tontine créée avec succès.');
}
public function historique()
{
    $tontinesSupprimees = Tontine::onlyTrashed()->get(); // Récupère les tontines soft-deleted
    return view('page.gerant.historique', compact('tontinesSupprimees'));
}
public function destroy($id)
{
    // Trouver la tontine à supprimer
    $tontine = Tontine::findOrFail($id);

    // Supprimer la tontine
    $tontine->delete();

    // Rediriger l'utilisateur avec un message de succès
    return redirect()->route('gerant.index')->with('success', 'Tontine supprimée avec succès.');
}

}
