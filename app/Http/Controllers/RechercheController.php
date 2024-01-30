<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function ViewArt(Request $request)
{
    $id_art = $request->input('id');


    $resultats = User::where('id', $id_art)->get();
    $produits = Product::where('id_art', $id_art)->get();

    return view('acceuil.viewartisan', ['produits' => $produits, 'resultats' => $resultats]);


}

    public function Recherche(Request $request)
{
    //dd($request->all());
    $request->validate([
        'critere' => 'required',
    ]);

    $critere = $request->input('critere');
    $terme = $request->input('terme');

    // Initialisez une variable pour stocker les résultats
    $resultats = [];

    // Effectuez le traitement en fonction du critère choisi
    if ($critere === 'nom') {
        // Traitement pour la recherche par nom
        $resultats = Product::where('name', 'like', '%' . $terme . '%')->get();
        return view('acceuil.rchparnom', ['resultats' => $resultats]);
    } elseif ($critere === 'adresse') {

       $resultats = User::where('adress', 'like', '%' . $terme . '%')
                     ->where('role_id', 1)
                     ->get();
        return view('acceuil.rchparadress', ['resultats' => $resultats]);

    } elseif ($critere === 'artisan') {
        $resultats = User::where('name', 'like', '%' . $terme . '%')
        ->where('role_id', 1)
        ->get();
return view('acceuil.rchparart', ['resultats' => $resultats]);

    }elseif ($critere === 'evaluation') {
        $idsProduits = Evaluation::where('rating', 'like', '%' . $terme . '%')->pluck('id_produit')->toArray();
        $resultats = Product::whereIn('id', $idsProduits)->get();

        return view('acceuil.rchpareval', ['resultats' => $resultats]);

    }

}
}
