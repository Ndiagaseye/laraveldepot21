<?php

namespace App\Http\Controllers;

use App\Models\User; // Importer le modèle User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function connexion()
    {
        return view('page.connexion.connexion');
    }

    public function auth(Request $request)
    {
        // Validation des données de connexion
        $aut = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative de connexion
        if (Auth::attempt($aut)) {
            // Regénérer la session pour des raisons de sécurité
            $request->session()->regenerate();
            // Récupérer l'utilisateur authentifié
            $user = Auth::user();

            // Vérification si l'utilisateur est actif
            if (!$user->isActive()) {
                Auth::logout();
                return back()->with('error', 'Votre compte est inactif.');
            }

            // Vérification du profil de l'utilisateur
            if ($user->profil == 'PARTICIPANT') {
                return redirect()->route('page.perticipant.participant');
            } elseif ($user->profil == 'GERANT') {
                return redirect()->route('gerant.index');
            } elseif ($user->profil == 'SUPER_ADMIN') {
                return redirect()->route('superadmin.dashboard');
            }


        }

        // Message d'erreur si l'authentification échoue
        return back()->with('error', 'Email ou mot de passe incorrect.');
    }
}
