<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Tontine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    public function home()
    {
        return view('pageBienvenue');
    }
    // Affiche la page d'inscription
    public function index()
    {
        return view('page.inscrition.index');
    }


    // Valider et enregistrer un nouvel utilisateur
    public function register(Request $request)
    {
        $request->validate([
            'prenom'        => 'required|min:3',
            'nom'           => 'required|min:2',
            'email'         => 'required|email|unique:users',
            'telephone'     => 'required|unique:users',
            'dateNaissance' => 'required|date|before_or_equal:' . now()->subYears(18)->toDateString(),
            'numeroCni'     => 'required|min:12|max:12',
            'adresse'       => 'required|string',
            'password'      => 'required|min:6|confirmed',
        ]);

        // Enregistrer dans la base de données
        $user = User::create([
            'prenom'    => $request->prenom,
            'nom'       => $request->nom,
            'email'     => $request->email,
            'telephone' => $request->telephone,
            'password'  => bcrypt($request->password),
        ]);

        if ($user) {
            $participant = new Participant();
            $participant->idUser       = $user->id;
            $participant->dateNaissance = $request->dateNaissance;
            $participant->cni          = $request->numeroCni;
            $participant->adresse      = $request->adresse;

            $participant->save();

            // Authentifier l'utilisateur après inscription
            Auth::login($user);

            // Redirection vers la page d'accueil du participant
            return redirect()->route('page.perticipant.participant')->with('success', 'Inscription réussie !');
        }

        return back()->with('erreur', "Une erreur s'est produite lors de l'inscription.");
    }

    // Page d'accueil des participants
    public function participantHome()
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $user = Auth::user();

        // Récupérer les tontines auxquelles il participe
        $tontines = Tontine::whereHas('cotisations', function ($query) use ($user) {
            $query->where('idUser', $user->id);
        })->get();

        return view('page.perticipant.participant', compact('tontines'));
    }
}
