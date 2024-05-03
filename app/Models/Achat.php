<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_fournisseur',
        'id_produit',
        'Quantite_Achat',
        'Prix_Achat',
        'validation_Achat',
        'facture_imprimé',

    ];
    public function produits()
    {
        return $this->hasOne(Produit::class,'id','id_produit');
    }
    public function fournisseurs()
    {
        return $this->belongsTo(Fournisseur::class,'id_fournisseur');
    }
}
