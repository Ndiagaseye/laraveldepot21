<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    protected $fillable = [
        'montant',
        'moyen_paiement',
        'idUser',
        'idTontine'

    ];

}
