<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historiqueformation extends Model
{
    protected $fillable = [
        'id_users', 'id_formation', 'score_théorique','score_pratique','resultat_test',
    ];

}
