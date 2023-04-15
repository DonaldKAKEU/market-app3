<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Panier extends Model
{
    use HasFactory;

    protected $table = "paniers";

    protected $fillable = [
        'produit_id',
        'user_id',
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function commandes()
    {
        return $this->belongsTo(Commande::class);
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
        $nouveau_panier = Panier::create([
            "produit_id" => $request ->input("produit_id"),
            "user_id" => $request ->input("user_id"),
        ]);

        $nouveau_panier->save();
    }

    public function drop($id){
        $panier = Panier::find($id);
        $panier->delete();
    }
}
