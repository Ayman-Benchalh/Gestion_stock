<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'id_produit',
        'Quantite_vente',
        'Prix_Vente',
        'validation_Vente',

    ];
    public function produits()
    {
        return $this->hasOne(Produit::class,'id','id_produit');
    }
    public function clients()
    {
        return $this->belongsTo(Client::class,'id_client');
    }
}
