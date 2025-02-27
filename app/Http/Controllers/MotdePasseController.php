<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password; // Assure-toi d'importer cette classe
use Illuminate\Http\Request;

class MotdePasseController extends Controller
{
    public function changer(){
        return view('page.mots_de_passe_oblier.oblier');
    }

    public function envoieMail(Request $request)
    {
        // Vérifie que l'email est bien renseigné et valide
        $request->validate(['email' => 'required|email']);

        // Envoie le lien de réinitialisation
        $status = Password::sendResetLink($request->only('email'));

        // Retourne un message en fonction du succès ou de l'échec de l'envoi
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
