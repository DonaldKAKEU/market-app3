<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reduction extends Model
{
    use HasFactory;
    protected $table = "reductions";
    protected $fillable = [
        'date_debut',
        'date_fin',
        'pourentage_reductio',
        'livraison_gratuite',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
