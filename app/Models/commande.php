<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = "commandes";

    protected $fillable = [
        'prix_total',
        'date_livraison',
        'user_id',
        'panier_id',
        'livreur_id',
        'quantite',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function panier()
    {
        return $this->belongsTo(Panier::class);
    }

    public function livreur()
    {
        return $this->belongsTo(Livreur::class);
    }

}
