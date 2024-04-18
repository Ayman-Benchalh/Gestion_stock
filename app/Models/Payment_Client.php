<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_Client',
        'Montant_Pay',

    ];
    public function clients()
     {
        return $this->belongsTo(Client::class ,'id_Client');

    }
}
