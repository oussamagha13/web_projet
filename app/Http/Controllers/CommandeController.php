<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Commande;
use App\Models\User;
use App\Models\Evaluation;

class CommandeController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur connecté


        $id_client = auth()->user()->id;


        // Vérifier si l'utilisateur est connecté
        if ($id_client) {
            // Récupérer les commandes de l'utilisateur en cours depuis la table pcommandes
            $commandes = Commande::where('id_client', $id_client)->get();


            // Afficher la vue avec les commandes
            return view('client.gestiondecommande', ['commandes' => $commandes]);
        }

        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        return redirect()->route('/')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
    }
    public function store(Request $request)
{


    // Utilisez $userId comme nécessaire

    // Validation des données du formulaire, si nécessaire
    $request->validate([
        'nomproduit' => 'required',
        'id_produit' => 'required',
        'prix' => 'required',
        'date' => 'required',
        'id_art' => 'required',
        'quantite' => 'required',

    ]);

    $id_client = auth()->user()->id;
    $adress_client = auth()->user()->adress;
    $tele_client = auth()->user()->tele;


    // Création d'une nouvelle Pcommande
    Commande::create([
        'nomproduit' => $request->nomproduit,
        'prix' => $request->prix,
        'quantite' => $request->quantite,
        'date' => $request->date,
        'id_produit' => $request->id_produit,
        'id_art' => $request->id_art,
        'id_client' => $id_client,
        'adress_client' => $adress_client,
        'tele_client' => $tele_client,

    ]);
    $commandeId = $request->id;

    Panier::find($commandeId)->delete();

    return redirect()->route('client.gestiondecommande')->with('success', 'commande ajouté avec succès');
}
public function supprimercommande($id)
    {
        // Retrouver la commande à supprimer
        $commande = Commande::find($id);

        // Vérifier si la commande existe
        if ($commande) {
            // Supprimer la commande
            $commande->delete();
            // Vous pouvez rediriger vers la page des commandes ou effectuer d'autres actions si nécessaire
            return redirect()->route('client.gestiondecommande');
        } else {
            // Gérer le cas où la commande n'est pas trouvée
            return redirect()->route('client.gestiondecommande')->with('error', 'Commande non trouvée.');
        }
    }
    public function affichelivreur($id_livreur)
    {
        // Retrouver la commande à supprimer
        $livreur = User::where('id', $id_livreur)->get();
        $eval = Evaluation::where('id_produit', $id_livreur)->get();
        return view('client.affichelivreur', ['livreur' => $livreur, 'eval' => $eval]);

    }
}
