<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
   public function listeCandidat()
{
    // Récupérer la liste des candidats depuis la base de données
    $candidats = Candidat::all();

    // Passer les candidats à la vue
    return view('candidat.liste')->with('candidats', $candidats);
}

   public function nombreVote()
{
    // Calculer le nombre total de votes pour tous les candidats
    $nombreVoteTotal = Candidat::sum('nombre_vote');

    // Passer le nombre total de votes à la vue
    return view('nombre_vote')->with('nombreVoteTotal', $nombreVoteTotal);
}

}
