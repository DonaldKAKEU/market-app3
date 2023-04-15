<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Livreur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'addresse',
        'numero_tel',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
        $nouveau_livreur = Livreur::create([
            "name" => $request ->input("name"),
            "addresse" => $request ->input("addresse"),
            "numero_tel" => $request ->input("numero_tel"),
        ]);

        $nouveau_livreur->save();
    }

    public function drop($id){
        $livreur = Livreur::find($id);
        $livreur->delete();
    }
}
