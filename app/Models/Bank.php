<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'Code_du_compte',
        'Nom_du_compte',
        'Nom_de_la_banque',
        'Devise',
        'Numero_de_compte',
        'SWIFT',
        'Description',
        'Balance',
      
    ];

}
