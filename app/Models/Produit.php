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
        'description',
        'prix',
        'validite',
        'cathegorie',
        'date_livraison',
        'commercant_id',
    ];

    public function commercant()
    {
        return $this->belongsTo(Commercant::class);
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
}
