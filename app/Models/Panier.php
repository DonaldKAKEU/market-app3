<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    protected $table = "paniers";

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function commandes()
    {
        return $this->belongsTo(Commande::class);
    }

}
