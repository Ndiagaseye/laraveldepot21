<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser',
        'dateNaissance',
        'cni',
        'adresse',
        'imageCni'
    ];

    // Relation : Un participant appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
