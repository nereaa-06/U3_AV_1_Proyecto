<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    //

    protected $fillable = [
        'user_id',
        'fecha_inicio',
        'fecha_fin',
        'observaciones',
    ];

    public function profesor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
