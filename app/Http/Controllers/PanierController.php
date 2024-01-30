<?php

namespace App\Http\Controllers;
use App\Models\Panier;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function paniers()
    {
        // Récupérez les commandes de l'utilisateur actuel
        $id_client = auth()->user()->id;
        $paniers = Panier::where('id_client', $id_client)->get();

        return view('client.panier', compact('paniers'));
    }
        public function store(Request $request)
        {
            // Validez les données si nécessaire
            $request->validate([
                'nomproduit' => 'required',
                'id_produit' => 'required',
                'prix' => 'required',
                'date' => 'required',
                'id_art' => 'required',
                'quantite' => 'required',

            ]);


            $id_client = auth()->user()->id;

            // Créez une nouvelle commande avec l'id_client
            Panier::create([
                'nomproduit' => $request->nomproduit,
                'id_produit' => $request->id_produit,
                'prix' => $request->prix,
                'date' => $request->date,
                'id_art' => $request->id_art,
                'quantite' => $request->quantite,
                'id_client' => $id_client,
            ]);

            // Redirigez ou effectuez d'autres actions en fonction de vos besoins
            return redirect()->route('client.index')->with('success', 'commande ajouté au panier avec succès');

        }
        public function supprimerPanier($id)
        {
            // Retrouver la commande à supprimer
            $panier = Panier::find($id);

            // Vérifier si la commande existe
            if ($panier) {
                // Supprimer la commande
                $panier->delete();
                // Vous pouvez rediriger vers la page des commandes ou effectuer d'autres actions si nécessaire
                return redirect()->route('client.panier');
            } else {
                // Gérer le cas où la commande n'est pas trouvée
                return redirect()->route('client.panier')->with('error', 'Commande non trouvée.');
            }
        }
}
