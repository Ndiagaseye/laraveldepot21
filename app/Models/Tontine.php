<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Ajouter cette ligne

class Tontine extends Model
{
    use HasFactory, SoftDeletes; // Ajouter SoftDeletes ici

    protected $fillable = ['frequence', 'libelle', 'dateDeb', 'dateFin', 'description', 'montantTotal', 'nbr-participant', 'montantBase'];

    public function cotisations()
    {
        return $this->hasMany(Cotisation::class, 'idTontine');
    }

    public function tirages()
    {
        return $this->hasMany(Tirage::class, 'idTontine');
    }
}
