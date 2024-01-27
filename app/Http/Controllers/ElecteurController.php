<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Electeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ElecteurController extends Controller
{
   public function nombreElecteur()
{
    // Récupérer le nombre total d'électeurs depuis la base de données
    $nombreElecteurTotal = Electeur::count();
    // Récupérer le nombre total d'électeurs ayant voté depuis la base de données
    $nombreVotantTotal = Electeur::whereNotNull('id_candidat_voter')->count();
    // Passer le nombre total d'électeurs et de votant à la vue
   return view('acceuil')->with([
    'nombreElecteurTotal' => $nombreElecteurTotal,
    'nombreVotantTotal' => $nombreVotantTotal
]);

}

   public function nombreVotant()
{
    // Récupérer le nombre total d'électeurs ayant voté depuis la base de données
    $nombreVotantTotal = Electeur::whereNotNull('id_candidat_voter')->count();
    
    // Passer le nombre total d'électeurs ayant voté à la vue
    return view('acceuil')->with('nombreVotantTotal', $nombreVotantTotal);

}

public function identifier_page(){
    return view('electeur.identification');
}
public function identifier(Request $request){
   $request->validate([
    'id'=> 'required'
   ]);

   $id = $request->input('id');
   $electeur= Electeur::find($id);
   $nomP=  $electeur->nom. ' ' .$electeur->prenom;
   // Créer une session avec l'id de l'utilisateur
   Session::put('id_utilisateur', $id);
   Session::put( 'nomP', $nomP);
   if ($electeur->id_candidat_voter !== 0) {
        // L'électeur a déjà voté, vous pouvez rediriger ou afficher un message d'erreur
        return redirect()->back()->with('error', 'Vous avez déjà voté.');
    }
  
 return redirect('/voter');
   
   
 
}

public function voterview(){
    return view('electeur.voter');
}

public function voterTraitement($id_candidat, $id_utilisateur )
{
   
    $idCandidatVote = $id_candidat;
    
    // // Vérifier si l'électeur a déjà voté
    // $electeur = Electeur::find(auth()->user()->id); // Supposons que l'électeur est authentifié

    // Vérifier si le candidat choisi existe
    $candidat = Candidat::find($idCandidatVote);
    if (!$candidat) {
        // Le candidat n'existe pas, vous pouvez rediriger ou afficher un message d'erreur
        return redirect()->back()->with('error', 'Candidat invalide.');
    }

    $electeur= Electeur::find($id_utilisateur);
    if ($electeur->id_candidat_voter !== 0) {
    // L'électeur a déjà voté, vous pouvez rediriger ou afficher un message d'erreur
    return redirect()->back()->with('error', 'Vous avez déjà voté.');
}

    // Mettre à jour la table des électeurs avec l'ID du candidat voté
    $electeur->update(['id_candidat_voter' => $idCandidatVote]);

    // Mettre à jour le nombre de votes pour le candidat
    $candidat->increment('nombre_vote');

    // Vous pouvez rediriger ou afficher un message de succès
 
    return redirect()->back()->with('success', 'Votre vote a été enregistré avec succès.');
}


}
