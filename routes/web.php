<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
// auth


//

Route::get('/', [AcceuilController::class, 'index'])->name('acceuil.index');
Route::get('/acceuil/sucre', [AcceuilController::class, 'sucre'])->name('acceuil.sucre');
Route::get('/acceuil/sale', [AcceuilController::class, 'sale'])->name('acceuil.sale');
Route::get('/acceuil/recherche', [RechercheController::class, 'recherche'])->name('acceuil.recherche');
Route::get('/acceuil/recherchenom', [RechercheController::class, 'Recherche'])->name('acceuil.rchparnom');
Route::get('/acceuil/rechercheadress', [RechercheController::class, 'Recherche'])->name('acceuil.rchparadress');
Route::post('/acceuil/viewart', [RechercheController::class, 'ViewArt'])->name('acceuil.viewart');
Route::get('/acceuil/viewartisan', [RechercheController::class, 'ViewArt'])->name('acceuil.viewartisan');
Route::get('/acceuil/rechercheart', [RechercheController::class, 'Recherche'])->name('acceuil.rchparart');
Route::get('/acceuil/rechercheeval', [RechercheController::class, 'Recherche'])->name('acceuil.rchpareval');
Route::get('/acceuil/viewprod/{id}', [AcceuilController::class, 'viewprod'])->name('acceuil.viewprod');
Route::get('/home', function () {
    return view('home');
});



Route::middleware(['role:1'])->group(function () {

    Route::get('/artisan/index', [ArtisanController::class, 'index'])->name('artisan.index');
    Route::get('/artisan/sucre', [ArtisanController::class, 'sucre'])->name('artisan.sucre');
    Route::get('/artisan/sale', [ArtisanController::class, 'sale'])->name('artisan.sale');
    Route::get('/artisan/gestioncommande', [ArtisanController::class, 'gestioncom'])->name('artisan.gestioncom');
    Route::get('/artisan/listelivreur/{id}', [ArtisanController::class, 'choixlivreur'])->name('artisan.choixlivreur');


    Route::get('/artisan/create', [ArtisanController::class, 'create'])->name('artisan.create');
     Route::put('/artisan/{produit}', [ArtisanController::class, 'update'])->name('artisan.update');
     Route::get('/artisan/{id}/edit', [ArtisanController::class, 'edit'])->name('artisan.edit');
     Route::post('/artisan/store', [ArtisanController::class, 'store'])->name('artisan.store');
     Route::delete('/produit/{produit}', [ArtisanController::class, 'destroy'])->name('produit.destroy');
     Route::post('/livreur/store', [LivreurController::class, 'store'])->name('livreur.store');
     Route::get('/artisan/viewprod/{id}', [ArtisanController::class, 'viewprod'])->name('artisan.viewprod');
    //profile
    Route::get('/artisan/profile', [ArtisanController::class, 'profile'])->name('artisan.profile');
    Route::put('/profileart/update', [ArtisanController::class, 'updateprofile'])->name('profileart.update');
    // accepter client
    Route::get('/artisan/accepterclient/{id}', [ArtisanController::class, 'accepterclient'])->name('artisan.accepterclient');
    Route::get('/artisan/annulerclient/{id}', [ArtisanController::class, 'annulerclient'])->name('artisan.annulerclient');

});

Route::middleware(['role:2'])->group(function () {
    Route::get('/client/index', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/sucre', [ClientController::class, 'sucre'])->name('client.sucre');
    Route::get('/client/sale', [ClientController::class, 'sale'])->name('client.sale');
    Route::post('/panier', [PanierController::class, 'store'])->name('panier.store');
    Route::get('/panier', [PanierController::class, 'paniers'])->name('client.panier');
    Route::delete('/supprimerPanier/{id}', [PanierController::class, 'supprimerPanier'])->name('supprimerPanier');
    //evaluation
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
    //commande
    Route::post('/commandes', [CommandeController::class, 'store'])->name('commande.store');
    Route::get('/client/gestiondecommande', [CommandeController::class, 'index'])->name('client.gestiondecommande');
    Route::delete('/supprimercommande/{id}', [CommandeController::class, 'supprimercommande'])->name('supprimer_commande');
    // recherche
    Route::get('/client/recherche', [ClientController::class, 'recherche'])->name('client.recherche');
    Route::get('/client/recherchenom', [ClientController::class, 'Recherche'])->name('client.rchparnom');
    Route::get('/client/rechercheadress', [ClientController::class, 'Recherche'])->name('client.rchparadress');
    Route::post('/client/viewart', [ClientController::class, 'ViewArt'])->name('client.viewart');
    Route::get('/client/viewartisan', [ClientController::class, 'ViewArt'])->name('client.viewartisan');
    Route::get('/client/rechercheart', [ClientController::class, 'Recherche'])->name('client.rchparart');
    Route::get('/client/rechercheeval', [ClientController::class, 'Recherche'])->name('client.rchpareval');

    //
    Route::get('/client/viewprod/{id}', [ClientController::class, 'viewprod'])->name('client.viewprod');
    //profile
    Route::get('/client/profile', [ClientController::class, 'profile'])->name('client.profile');
    Route::put('/profile/update', [ClientController::class, 'updateprofile'])->name('profile.update');
    //affiche livreur
    Route::get('/client/affichelivreur/{id_livreur}', [CommandeController::class, 'affichelivreur'])->name('client.affichelivreur');


});

Route::middleware(['role:3'])->group(function () {
    Route::get('/livreur/index', [LivreurController::class, 'index'])->name('livreur.index');
    Route::get('/livreur/accepterefuser', [LivreurController::class, 'accepterefuse'])->name('livreur.accepterefuser');
    Route::get('/livreur/delete/{id}/{id_commande}', [LivreurController::class, 'destroy'])->name('livreur.destroy');
    Route::post('/livreur/accepte', [LivreurController::class, 'accepte'])->name('livreur.accepte');
    Route::post('/livreur/livrer', [LivreurController::class, 'livrer'])->name('livreur.livrer');
    //profile
    Route::get('/livreur/profile', [LivreurController::class, 'profile'])->name('livreur.profile');
    Route::put('/profileliv/update', [LivreurController::class, 'updateprofile'])->name('profileliv.update');


});
Route::get('/admin/dashboard', [AdminController::class, 'index']);

