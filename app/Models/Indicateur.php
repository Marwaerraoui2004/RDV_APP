<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicateur extends Model
{
    protected $fillable = ['user_id', 'nom', 'valeur', 'progression', 'etat'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

