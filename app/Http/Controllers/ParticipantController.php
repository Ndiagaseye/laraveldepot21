<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ParticipantController extends Controller
{
    public function index()
    { $users = User::with('participant')->get(); // Charge les utilisateurs avec leur participant
        return view('users.liste', compact('users'));
    }
}
