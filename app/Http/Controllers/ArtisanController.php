<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class ArtisanController extends Controller
{
    public function index()
    {
        // Logique pour la page d'index des utilisateurs
        $id_art = auth()->user()->id;

        // Récupérer les produits associés à l'utilisateur connecté
        $produits = Product::where('id_art', $id_art)->get();
        return view('artisan.index', ['produits' => $produits]);
    }
    public function sucre()
    {
        // Logique pour la page d'index des utilisateurs
        $id_art = auth()->user()->id;

        // Récupérer les produits associés à l'utilisateur connecté

        $produits = Product::where('type', 'sucre')->where('id_art', $id_art)->get();
        return view('artisan.sucre', ['produits' => $produits]);

    }
    public function sale()
    {
        // Logique pour la page d'index des utilisateurs
        $id_art = auth()->user()->id;

        // Récupérer les produits associés à l'utilisateur connecté
        $produits = Product::where('type', 'sale')->where('id_art', $id_art)->get();
        return view('artisan.sale', ['produits' => $produits]);
    }
    public function viewprod($id)
    {
        $id_art = auth()->user()->id;
        $produits = Product::where('id', $id)->where('id_art', $id_art)->get();

        $listcom = Commande::where('id_produit', $id)->where('id_art', $id_art)->get();
        return view('artisan.viewprod', ['produits' => $produits, 'listcom' => $listcom]);

    }
    public function gestioncom()
    {
        // Logique pour la page d'index des utilisateurs
        $id_art = auth()->user()->id;

        // Récupérer les produits associés à l'utilisateur connecté
        $commandes = Commande::where('id_art', $id_art)->get();
        return view('artisan.gestioncom', ['commandes' => $commandes]);
    }

    public function choixlivreur($id)
    {
        // Logique pour la page d'index des utilisateurs


        // Récupérer les produits associés à l'utilisateur connecté
        $livreurs = User::where('role_id', '3')->where('dis', '=', 'disponible')->get();
        return view('artisan.listelivreur', ['livreurs' => $livreurs, 'id_commande' => $id]);
    }


    public function create()
    {
        return view('artisan.create');
    }

    public function store(Request $request)
{
    //dd($request->all());
    $request->validate([
        'name' => 'required',
        'prix' => 'required',
        'quantite' => 'required',
        'type' => 'required',
        'image'=>'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        // Ajoutez d'autres règles de validation selon vos besoins
    ]);

    $id_art = auth()->user()->id;
    $user = auth()->user();


    // Traitement des images
    $input = $request->all();

   if ($image = $request->file('image'))
    {
       $destinationPath =  'images/';
       $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
       $image->move($destinationPath, $profileImage);
       $input['image'] = "$profileImage";

    }

    $input['nom_art'] = $user->name;

    Product::create($input);
    return redirect()->route('artisan.index')->with('success', 'Produit ajouté avec succès');

}

public function edit($id)
{

    $produit = Product::findOrFail($id);

    return view('artisan.edit', compact('produit'));
}
public function update(Request $request, Product $produit)
{
    $request->validate([
        'name' => 'required',
        'prix' => 'required',
        'quantite' => 'required',
        'image'=>'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        // Ajoutez d'autres règles de validation selon vos besoins
    ]);

    $id_art = auth()->user()->id;

    // Traitement des images
    $input = $request->all();

    if ($image = $request->file('image'))
    {
       $destinationPath =  'images/';
       $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
       $image->move($destinationPath, $profileImage);
       $input['image'] = "$profileImage";

    }else{
        unset( $input['image']);
    }
    $produit->update($input);


    return redirect()->route('artisan.index')->with('success', 'Produit update avec succès');
}

    public function destroy(Product $produit)
    {
        $produit->delete();



        return redirect()->route('artisan.index')->with('success', 'Produit suprimer avec succès');
    }
    public function profile()
    {
        // Logique pour la page d'index des utilisateurs
        $user = auth()->user();

        // Récupérer les produits associés à l'utilisateur connecté
        //$user = User::where('id', $id)->get();
        return view('artisan.profile', compact('user'));
    }
    public function updateprofile(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'adress' => 'required|string|max:255',
            'tele' => 'required|string|max:15',
            'heure_douverture' => 'required|string|max:15',

        ]);

        // Mettre à jour les informations du profil de l'utilisateur connecté
        $user = Auth::user();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'adress' => $request->input('adress'),
            'tele' => $request->input('tele'),
            'heure_douverture' => $request->input('heure_douverture'),
            'type_produit' => $request->input('type_produit'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('artisan.profile')->with('success', 'Profil mis à jour avec succès');
    }
    public function accepterclient($id)
    {

        $com = Commande::find($id);
        $com->update(['etat' => 'Accepter']);
        $id_art = auth()->user()->id;

        $commandes = Commande::where('id_art', $id_art)->get();
        return view('artisan.gestioncom', ['commandes' => $commandes]);

    }
    public function annulerclient($id)
    {

        $com = Commande::find($id);
        $com->update(['etat' => 'Annuler']);
        $id_art = auth()->user()->id;

        $commandes = Commande::where('id_art', $id_art)->get();
        return view('artisan.gestioncom', ['commandes' => $commandes]);

    }
}
