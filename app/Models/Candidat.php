<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

     protected $fillable = [
        'nom',
        'prenom',
        'age',
        'date_naissance',
        'lieu_naissance',
        'nombre_vote',
    ];
    // public function candidat()
    // {
    //     return $this->belongTo(Candidat::class);
    // }
}





