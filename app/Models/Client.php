<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_Complet',
        'Adresse',
        'email',
        'telephone',
        'Montant'
    ];

    // public function vente(){
    //     return $this->hasMany(vente::class);
    // }
}
