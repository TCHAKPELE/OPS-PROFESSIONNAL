<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
     protected $fillable = [
        'nom_Institut', 'nom_formation', 'contact','email','Date_debut','Date_fin','id_type'
    ];
}
