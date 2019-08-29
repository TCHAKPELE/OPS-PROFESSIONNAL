<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribution_zone extends Model
{
    protected $fillable = [
        'nom_zone', 'nbr_ops', 'num_offre'
    ];

}
