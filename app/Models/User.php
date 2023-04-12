<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
    

}
