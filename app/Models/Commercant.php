<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
