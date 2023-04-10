<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produit extends Model
{
    use HasFactory;
    protected $table = "produits";

    protected $fillable = [
        'libelle',
        'prix',
        'numero_produit',
        'taille',
    ];

    public function commande(){
        return $this->hasMany(Commande::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }

}