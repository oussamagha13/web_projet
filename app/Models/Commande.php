<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commandes';

    protected $fillable = ['nomproduit', 'prix', 'quantite', 'date', 'id_produit', 'id_art', 'id_client', 'adress_client', 'adress_client', 'etat', 'tele_client', 'id_livreur'];
    public function user()
    {
    return $this->belongsTo(User::class, 'id_client');
    }
    public function product()
    {
    return $this->belongsTo(Product::class, 'id_produit');
    }
}
