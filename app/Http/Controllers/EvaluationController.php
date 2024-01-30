<?php

namespace App\Http\Controllers;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function store(Request $request)
{
    // Valider la requête
    $request->validate([
        'id_produit' => 'required',
        'rating' => 'required',

        // Ajoute d'autres règles de validation si nécessaire
    ]);


    $id_client = auth()->user()->id;

    $input = $request->all();




    Evaluation::create([
        'id_produit' => $request->id_produit,
        'id_client' => $id_client,
        'rating' => $request->rating,
        'comment' => $request->comment,
    ]);

    return redirect()->route('client.index')->with('success', 'Produit évalué avec succès');

}
}
