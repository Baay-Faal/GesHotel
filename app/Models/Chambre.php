<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $fillable = [
        'numero',
        'nom',
        'type',
        'prix',
        'description',
        'disponible',
    ];
    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }

}
