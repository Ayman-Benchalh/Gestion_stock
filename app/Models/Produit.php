<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [

        'Nom_Prod',
        'Designation_Prod',
        'Quantité',
        'Prix',
        'Nom_Fournisseur',

    ];
    public function ventes(){
        return $this->belongsTo(Vente::class);
    }

}
