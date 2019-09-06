<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribution_zone;
use Illuminate\Support\Facades\DB;

class ajout_zone extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }



      public function ajout(Request $request)
    {
     $project=Attribution_zone::all();

    $nom_zone=$request->input('nom_zone');
     $nbr_ops=$request->input('nbr_ops');
     $num_offre=$request->input('num_offre');
      $renumeration=$request->input('renumeration');
     
     $id_appel=$num_offre;
Attribution_zone::create($request->all());
        return view('ajout_zone2',compact('id_appel'));
    }
}
