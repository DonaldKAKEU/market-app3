<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


}
