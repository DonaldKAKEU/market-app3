<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        'panier_id'
    ];

    public function commercant()
    {
        return $this->belongsTo(Commercant::class);
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }

    public function panier(){
        return $this->belongsTo(Panier::class);
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

    public static function new(Request $request, $commercant_id){
        $nouveau_produit = Produit::create([
            "libelle" => $request ->input("libelle"),
            "description" => $request ->input("description"),
            "prix" => $request ->input("prix"),
            "validite" => $request ->input("validite"),
            "cathegorie" => $request ->input("cathegorie"),
            "date_livraison" => $request ->input("date_livraison"),
            "commercant_id" => $commercant_id,
        ]);

        $nouveau_produit->save();
    }

    public function drop($id){
        $nouveau_produit = Produit::find($id);
        $nouveau_produit->delete();
    }
    
}
