<?php

namespace App\Http\Controllers;
use App\Models\User; // Importation du modèle User

use Illuminate\Http\Request;

class TontineController extends Controller
{
    public function affichageListe()
    {
        $participants = User::all();

        return view('page.contenue.liste' ,compact('participants'));
    }
}
