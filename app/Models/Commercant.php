<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Commercant extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'name',
        'addresse',
        'numero_tel',
        'note',
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
        $nouveau_commercant = Commercant::create([
            "user_id" => $request ->input("user_id"),
            "name" => $request ->input("name"),
            "addresse" => $request ->input("addresse"),
            "numero_tel" => $request ->input("numero_tel"),
            "note" => $request ->input("note"), 
        ]);

        $nouveau_commercant->save();
    }

    public function drop($id){
        $commercant = Commercant::find($id);
        $commercant->delete();
    }

}
