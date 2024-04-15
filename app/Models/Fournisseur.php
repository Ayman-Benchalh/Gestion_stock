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
       return $this->hasMany(Achat::class);
    }
    public function payment_fournissers()
    {
       return $this->hasMany(Payment_Client::class);

   }
}
