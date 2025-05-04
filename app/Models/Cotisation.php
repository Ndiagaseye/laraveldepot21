<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;

    protected $fillable = ['idUser', 'idTontine', 'montant', 'moyen_paiement'];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function tontine()
    {
        return $this->belongsTo(Tontine::class, 'idTontine');
    }
}
