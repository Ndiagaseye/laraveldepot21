<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('connexion.conexion');
        }

        $user = Auth::user();

        // Vérifie que le rôle de l'utilisateur correspond
        if ($user->profil !== strtoupper($role)) {
            abort(403, 'Accès refusé.');
        }

        return $next($request);
    }
}
