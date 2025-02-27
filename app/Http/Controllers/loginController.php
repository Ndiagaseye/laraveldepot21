<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function connexion()
    {
        return view('page.connexion.connexion');
    }

    public function auth(Request $request)
    {
        $aut = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($aut)) {
            $request->session()->regenerate();
            return redirect()->route('home'); // Redirection si connexion réussie
        }

        // Message d'erreur si l'authentification échoue
        return back()->with('error', 'Email ou mot de passe incorrect.');
    }

}
