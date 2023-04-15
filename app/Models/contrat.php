<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Contrat extends Model
{
    use HasFactory;

    protected $table = "contrats";
    protected $fillable = [
        'start_date',
        'end_date',
        'commission',
        'conditions',
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

    public function new(Request $request){
        $nouveau_contrat = Contrat::create([
            "start_date" => $request ->input("start_date"),
            "end_date" => $request ->input("end_date"),
            "user_id" => $request ->input("user_id"),
            "commission" => $request ->input("commission"),
            "conditions" => $request ->input("conditions"), 
        ]);

        $nouveau_contrat->save();
    }

    public function drop($id){
        $contrat = Contrat::find($id);
        $contrat->delete();
    }
}
