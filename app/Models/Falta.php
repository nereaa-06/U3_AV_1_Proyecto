<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    //

    protected $fillable = ['user_id', 'fecha_inicio', 'fecha_fin'];

    public function profesor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
