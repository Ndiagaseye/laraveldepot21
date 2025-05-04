<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tontine;

use App\Models\User;
class ParticipantController extends Controller
{

    public function gerant()
    {
        return view('page.gerant.index');
    }

    public function index()
    { $users = User::with('participant')->get(); // Charge les utilisateurs avec leur participant
        return view('page.perticipant.participant', compact('users'));
    }
    public function showParticipantPage()
    {
        $tontines = Tontine::where('user_id', Auth::id())->get();
        return view('page.perticipant.participant', compact('tontines'));
    }

}
