<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\This;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function panier()
    {
        return $this->hasMany(Panier::class);
    }

    public function reductions()
    {
        return $this->hasMany(Reduction::class);
    }

    public function info_carte_bancaire()
    {
        return $this->hasMany(Info_carte_bancaire::class);
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

    public  static function new(Request $request){
        $nouveau_user = User::create([
            "name" => $request ->input("name"),
            "email" => $request ->input("email"),
            "password" => $request ->input("password"),
            "role" => $request ->input("role"),
            ]);

        $nouveau_user->save();

    }



    public static function dropById($id){
        $user = User::find($id);
        $user->delete();
    }

    public static function  getNameById($id){
        $name = User::where("id", $id)->get('name');
        return $name;
    }

    public static function getIdByName($name){
        return User::where('name', $name)->get('id');
    }

}
