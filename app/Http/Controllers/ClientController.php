<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        // Logique pour la page d'index des utilisateurs

        $produits = Product::all();


        // Récupérer les produits associés à l'utilisateur connecté

        return view('client.index', ['produits' => $produits]);
    }
    public function sucre()
    {


        $produits = Product::where('type', '=', 'sucre')->get();
        return view('client.sucre', ['produits' => $produits]);
    }
    public function sale()
    {



        // Récupérer les produits associés à l'utilisateur connecté
        $produits = Product::where('type', '=', 'sale')->get();
        return view('client.sale', ['produits' => $produits]);
    }
    public function ViewArt(Request $request)
{
    $id_art = $request->input('id');


    $resultats = User::where('id', $id_art)->get();
    $produits = Product::where('id_art', $id_art)->get();

    return view('client.viewartisan', ['produits' => $produits, 'resultats' => $resultats]);


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
        return view('client.rchparnom', ['resultats' => $resultats]);
    } elseif ($critere === 'adresse') {

       $resultats = User::where('adress', 'like', '%' . $terme . '%')
                     ->where('role_id', 1)
                     ->get();
        return view('client.rchparadress', ['resultats' => $resultats]);

    } elseif ($critere === 'artisan') {
        $resultats = User::where('name', 'like', '%' . $terme . '%')
        ->where('role_id', 1)
        ->get();
return view('client.rchparart', ['resultats' => $resultats]);

    }elseif ($critere === 'evaluation') {
        $idsProduits = Evaluation::where('rating', 'like', '%' . $terme . '%')->pluck('id_produit')->toArray();
        $resultats = Product::whereIn('id', $idsProduits)->get();

        return view('client.rchpareval', ['resultats' => $resultats]);

    }

}
public function viewprod($id)
    {
        $produits = Product::where('id', $id)->get();

        return view('client.viewprod', ['produits' => $produits]);

    }
    public function profile()
    {
        // Logique pour la page d'index des utilisateurs
        $user = auth()->user();

        // Récupérer les produits associés à l'utilisateur connecté
        //$user = User::where('id', $id)->get();
        return view('client.profile', compact('user'));
    }
    public function updateprofile(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'adress' => 'required|string|max:255',
            'tele' => 'required|string|max:15',
        ]);

        // Mettre à jour les informations du profil de l'utilisateur connecté
        $user = Auth::user();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'adress' => $request->input('adress'),
            'tele' => $request->input('tele'),
        ]);

        return redirect()->route('client.profile')->with('success', 'Profil mis à jour avec succès');
    }
}
