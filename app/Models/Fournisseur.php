<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_Complet',
        'Adresse',
        'email',
        'telephone',
        'Montant'
    ];

    public function achat() {
       return $this->hasMany(Achat::class,'id_fournisseur');
    }
    public function payments()
    {
       return $this->hasMany(Payment_Client::class,'id_Fournisseur');

   }
}
