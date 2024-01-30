<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Product;
use App\Models\CommandeLiv;
use App\Models\Comaccepte;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LivreurController extends Controller
{
    public function index()
    {

        $id_livreur = auth()->user()->id;

        // Récupérer les produits associés à l'utilisateur connecté
        $com = Comaccepte::where('id_livreur', $id_livreur)->get();
        return view('livreur.index', ['com' => $com]);


    }

    public function accepterefuse()
    {

        // Récupérer les produits associés à l'utilisateur connecté
        $id_liv = auth()->user()->id;

        // Récupérer les produits associés à l'utilisateur connecté
        $commandes = CommandeLiv::where('id_livreur', $id_liv)->get();
        return view('livreur.accepterefuser', ['commandes' => $commandes]);

    }

    public function store(Request $request)
{
    //dd($request->all());
    $request->validate([
        'id_commande' => 'required',
        'id_livreur' => 'required',

    ]);
    $idCommande = $request->input('id_commande');
    $idLivreur = $request->input('id_livreur');


    $id_art = auth()->user()->id;
    $adress_art = auth()->user()->adress;
    $tele_art = auth()->user()->tele;

    $commande = Commande::find($idCommande);
    $adress_client = $commande->adress_client;
    $id_produit = $commande->id_produit;
    // Traitement des images

    Commandeliv::create([
        'id_commande' => $idCommande,
        'id_livreur' => $idLivreur,
        'id_art' => auth()->user()->id,
        'adress_art' => auth()->user()->adress,
        'adress_client' => $commande->adress_client,
        'id_produit' => $commande->id_produit,
        'nomproduit' => $commande->nomproduit,
        'prix' => $commande->prix,
        'quantite' => $commande->quantite,
        'tele_client' => $commande->tele_client,
        'tele_art' => $tele_art,

    ]);

    $commande->update(['etat' => 'En traitement']);


    return redirect()->route('artisan.gestioncom');

}
public function destroy($id, $id_commande)
{
    $comliv = CommandeLiv::find($id);
    $commande = Commande::find($id_commande);
    $commande->update(['etat' => 'Refuser']);


    $comliv->delete();



    return redirect()->route('livreur.accepterefuser');
}

public function accepte(Request $request)
{
    //dd($request->all());
    $request->validate([
        'id_commande' => 'required',


    ]);
    $idCommande = $request->input('id_commande');
    $id_produit = $request->input('id_produit');
    $id_art = $request->input('id_art');
    $nomproduit = $request->input('nomproduit');
    $prix = $request->input('prix');
    $quantite = $request->input('quantite');
    $adress_client = $request->input('adress_client');
    $tele_client = $request->input('tele_client');
    $adress_art = $request->input('adress_art');
    $tele_art = $request->input('tele_art');
    $id_livreur = auth()->user()->id;

    $id_com = $request->input('id');
    $comliv = CommandeLiv::find($id_com);
    $comliv->delete();
    $etat = 'En cours';

    $commande = Commande::find($idCommande);


    // Traitement des images

    Comaccepte::create([
        'id_commande' => $idCommande,
        'id_livreur' => $id_livreur,
        'id_art' => $id_art,
        'adress_art' => $adress_art,
        'adress_client' => $adress_client,
        'id_produit' => $id_produit,
        'nomproduit' => $nomproduit,
        'prix' => $prix,
        'quantite' => $quantite,
        'tele_client' => $tele_client,
        'tele_art' => $tele_art,
        'etat' => $etat,
    ]);

    $commande->update(['etat' => 'En cours']);
    $commande->update(['id_livreur' => $id_livreur]);



    return redirect()->route('livreur.accepterefuser');

}
public function livrer(Request $request)
{
    //dd($request->all());
    $request->validate([
        'id' => 'required',


    ]);






    $id = $request->input('id');
    $id_com = $request->input('id_commande');

    $comacc = Comaccepte::find($id);
    $comacc->update(['etat' => 'livrer']);

    $commande = Commande::find($id_com);
    $commande->update(['etat' => 'livrer']);


    // Traitement des images




    return redirect()->route('livreur.index');

}
public function profile()
    {
        // Logique pour la page d'index des utilisateurs
        $user = auth()->user();

        // Récupérer les produits associés à l'utilisateur connecté
        //$user = User::where('id', $id)->get();
        return view('livreur.profile', compact('user'));
    }
    public function updateprofile(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'adress' => 'required|string|max:255',
            'tele' => 'required|string|max:15',
            'dis' => 'required|string|max:15',
        ]);

        // Mettre à jour les informations du profil de l'utilisateur connecté
        $user = Auth::user();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'adress' => $request->input('adress'),
            'tele' => $request->input('tele'),
            'dis' => $request->input('dis'),
        ]);

        return redirect()->route('livreur.profile')->with('success', 'Profil mis à jour avec succès');
    }

}
