<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tontine extends Model
{
    protected $fillable = [
    'frequence',
    'libelle',
    'dateDeb',
    'dateFin',
    'description',
    'montantTotal',
    'nbr-participant',
    'montantBase',
    ];
}
