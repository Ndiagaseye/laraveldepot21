<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'prenom', 'nom', 'telephone', 'email', 'password', 'profil', 'is_active', 'last_login_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    // Vérification des rôles
    public function isSuperAdmin()
    {
        return $this->profil === 'SUPER_ADMIN';
    }

    public function isGerant()
    {
        return $this->profil === 'GERANT';
    }

    public function isParticipant()
    {
        return $this->profil === 'PARTICIPANT';
    }

    // Méthode pour vérifier si l'utilisateur est actif
    public function isActive()
    {
        return $this->is_active;
    }

    public function gerant()
{
    return $this->hasOne(Gerant::class);
}

}
