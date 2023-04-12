<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
