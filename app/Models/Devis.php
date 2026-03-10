<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;
    protected $fillable = [
        'Description',
        'Prix_unitaire_HT',
        'Quantite',
        'Unitaire_HT',
      
    ];
}
