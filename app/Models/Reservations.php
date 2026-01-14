<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $fillable = [
        'user_id',
        'chambre_id',
        'date_debut',
        'date_fin',
        'total_prix',
        'statut',
    ];
}
