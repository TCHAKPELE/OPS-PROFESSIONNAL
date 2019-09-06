<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appel_d_offre extends Model
{
    protected $fillable = [
        'nom_entreprise', 'num_identification','tel','email','num_place'
    ];

   

}
