<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Reduction extends Model
{
    use HasFactory;
    protected $table = "reductions";
    protected $fillable = [
        'date_debut',
        'date_fin',
        'pourentage_reduction',
        'livraison_gratuite',
        'user_id',
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

    public static function new(Request $request, $id_user):void{
        $nouvelle_reduction = Reduction::create([
            "date_debut" => now(),
            "end_date" => $request ->input("end_date"),
            "user_id" => $id_user,
            "pourcentage_reduction" => $request ->input("pourcentage_reduction"),
            "livraison_gratuite" => $request ->input("livraison_gratuite"), 
        ]);

        $nouvelle_reduction->save();
    }

    public static function dropById($id){
        $reduction = Reduction::find($id);
        $reduction->delete();
    }

    public function drop(){
        $this->delete();
    }

}
