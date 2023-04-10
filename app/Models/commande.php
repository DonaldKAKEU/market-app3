<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = "Commandes";

    public function user(){
        return $this->hasMany(User::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

}
