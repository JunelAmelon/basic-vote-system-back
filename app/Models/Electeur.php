<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electeur extends Model
{
    use HasFactory;

     protected $fillable = [
        'nom',
        'prenom',
        'age',
        'date_naissance',
        'lieu_naissance',
        'id_candidat_voter',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'id_candidat_voter');
    }
}
