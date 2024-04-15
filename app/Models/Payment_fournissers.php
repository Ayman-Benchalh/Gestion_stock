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
    public function fournisseur()
     {
        return $this->belongsTo(Fournisseur::class);

    }
}
