<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_fournissers extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_Fournisseur',
        'Montant_Pay',

    ];
    public function fournisseurs()
     {
        return $this->belongsTo(Fournisseur::class,'id_Fournisseur');

    }
}
