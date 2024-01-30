<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeLiv extends Model
{
    use HasFactory;
    protected $table = 'commandeliv';

    protected $fillable = ['id_commande', 'id_livreur', 'id_art', 'adress_art', 'adress_client', 'id_produit',
     'nomproduit', 'prix', 'quantite', 'tele_client', 'tele_art'];
    public function product()
    {
    return $this->belongsTo(Product::class, 'id_produit');
    }
}
