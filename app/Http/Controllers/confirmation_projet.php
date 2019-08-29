<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Historiqueselection;
use App\Attribution_zone;

class confirmation_projet extends Controller
{
    public function end(Request $request){

     $controle= DB::table('attribution_zones')->where('attribution_zones.num_zone','=',$request->input('lieu'))->get();

     foreach($controle as $controle){

     $controle=$controle->nbr_ops;
     }
     

    if($controle>0){
    
    DB::table('historiqueselections')
            ->where('num_offre', $request->input('num'))
            ->update(['num_zone' => $request->input('lieu')]);

     DB::table('attribution_zones')->where('num_zone', $request->input('lieu'))->decrement('nbr_ops');



 $request->session()->flash('msg2','Félicitation vous êtes sélectionné pour cet Appel d"offre ');

 return view('home',compact('request'));

    }
    else {

    $request->session()->flash('msg2','Nombre maximum d"ops atteint pour cette zone');

    $choix= DB::table('attribution_zones')->where('attribution_zones.num_offre','=',$request->input('num'))->get();

    $var1=$request->input('num');

     return view('choix_affectation',compact('request','var1','choix'));
    
	
}

   

    }
}
