<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


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


	/**
	 * @return mixed
	 */
	public function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return self
	 */
	public function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}

    public function new(Request $request){
        $nouvelle_commande = Commande::create([
            "prix_total" => $request ->input("prix_total"),
            "date_livraison" => $request ->input("date_livraison"),
            "user_id" => $request ->input("user_id"),
            "panier_id" => $request ->input("panier_id"),
            "livreur_id" => $request ->input("livreur_id"),
            "quantite" => $request ->input("quantite"), 
        ]);

        $nouvelle_commande->save();
    }

    public function drop($id){
        $commande = Commande::find($id);
        $commande->delete();
    }
}
