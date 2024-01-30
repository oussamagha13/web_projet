<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $table = 'evaluations'; // Specify the table name if it's different from the default

    protected $fillable = [
        'id_produit',
        'id_client',
        'rating',
        'comment',

        // Add other fields as needed
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_produit', 'id');
    }
}
