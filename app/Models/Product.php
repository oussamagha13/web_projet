<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    //public function evaluations()
    //{
    //    return $this->hasMany(Evaluation::class, 'id_produit', 'id');
    //}
    protected $table = 'produits'; // Specify the table name if it's different from the default

    protected $fillable = [
        'name',
        'quantite',
        'prix',
        'id_art',
        'image',
        'type',
        'nom_art',
        'quantitemin',
        'description',
        'soustype',
        // Add other fields as needed
    ];
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'id_produit', 'id');
    }

}
