<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Info_carte_bancaire extends Model
{
    use HasFactory;
    protected $table = "info_carte_bancaires";


    protected $fillable = [
        'numero',
        'solde',
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
        $nouvelle_info_carte_bancaire = Info_carte_bancaire::create([
            "numero" => $request ->input("numero"),
            "solde" => $request ->input("solde"),
            "user_id" => $request ->input("user_id"), 
        ]);

        $nouvelle_info_carte_bancaire->save();
    }

    public function drop($id){
        $info_carte_bancaire = Info_carte_bancaire::find($id);
        $info_carte_bancaire->delete();
    }

}
