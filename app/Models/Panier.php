<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $table = 'paniers'; // Specify the table name if it's different from the default

    protected $fillable = [
        'nomproduit',
        'id_produit',
        'quantite',
        'prix',
        'date',
        'id_art',
        'id_client',


        // Add other fields as needed
    ];
}
