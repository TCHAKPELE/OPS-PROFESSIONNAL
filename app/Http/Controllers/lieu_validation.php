<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historiqueselection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class lieu_validation extends Controller
{
    public function valider(Request $request){

    $controle= DB::table('historiqueselections')->where('historiqueselections.id','=',Auth::user()->id)->where('historiqueselections.num_offre','=',$request->get('value'))->count();
    


    if($controle==0)

    {

    $nombre_zone=DB::table('attribution_zones')->where('attribution_zones.num_offre','=',$request->get('value'))->count();

    $cloturation=DB::table('attribution_zones')->where('attribution_zones.num_offre','=',$request->get('value'))->where('attribution_zones.nbr_ops','=',0)->count();

    $name=DB::table('appel_d_offres')->where('appel_d_offres.id','=',$request->get('value'))->get();

    foreach($name as $name){

    $name=$name->nom_entreprise;


    }

    $nom_appel=$name;

    

    if($cloturation==$nombre_zone){

     DB::table('appel_d_offres')
            ->where('id', $request->get('value'))
            ->update(['complet' => 1]);


     $Liste_admin= DB::table('users')->where('users.roles','=','admin')->get();

   foreach($Liste_admin as $OPS )

   {
     Mail::send('emails.Notification_appel_complet',['nom'=>$OPS->name,'nom_appel'=>$nom_appel],function($message) use ($OPS){

 $message->to($OPS->email)->subject('Appel doffre Saturé');


});

   }


    }


    $var = new Historiqueselection;

    $var->id=Auth::user()->id;
    $var->num_offre=$request->get('value');
    $var->num_zone=0;

    $var->save();

    $var1=$var->num_offre;

    $request->session()->flash('msg','Choisissez votre Lieu d_affectation');

   

    $choix= DB::table('attribution_zones')->where('attribution_zones.num_offre','=',$request->get('value'))->get();


     return view('choix_affectation',compact('request','var1','choix'));

     	
    
    }
    else {

     $request->session()->flash('msg','Vous vous êtes déjà enrégistrer pour cet appel d"offre ');

     $projects= DB::table('appel_d_offres')->where('appel_d_offres.statut','=',1)->get();

return view('liste_appel_doffre',compact('projects','request'));

	
}



    

    }
}
