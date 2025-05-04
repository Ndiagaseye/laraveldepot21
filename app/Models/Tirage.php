<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tirage extends Model
{
    use HasFactory;

    protected $fillable = ['idUser', 'idTontine'];

    public function participant()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function tontine()
    {
        return $this->belongsTo(Tontine::class, 'idTontine');
    }
}
