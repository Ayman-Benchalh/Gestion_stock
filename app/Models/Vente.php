<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client',
        'id_produit',
        'Quantite_vente',
        'Prix_Vente',

    ];
}
