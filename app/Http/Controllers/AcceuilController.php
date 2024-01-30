<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AcceuilController extends Controller
{
    public function index()
{
    $produits = Product::all();
    return view('acceuil.index', ['produits' => $produits]);
}

    public function sucre()
    {


        $produits = Product::where('type', '=', 'sucre')->get();
        return view('acceuil.sucre', ['produits' => $produits]);
    }
    public function sale()
    {



        // Récupérer les produits associés à l'utilisateur connecté
        $produits = Product::where('type', '=', 'sale')->get();
        return view('acceuil.sale', ['produits' => $produits]);
    }
    public function viewprod($id)
    {
        $produits = Product::where('id', $id)->get();

        return view('acceuil.viewprod', ['produits' => $produits]);

    }
}
