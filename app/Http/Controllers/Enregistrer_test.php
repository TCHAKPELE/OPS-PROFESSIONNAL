<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historiqueformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Formation;

class Enregistrer_test extends Controller
{
    public function save(Request $request){


    
    $formations= DB::table('formations')->where('formations.id_formation','=',$request->get('value'))->get();

       foreach($formations as $formations){

       
   $x=$formations->nom_Institut;
    $x1=$formations->email;
    $x2=$formations->nom_formation;
    $x3=$formations->Date_debut;
    }


   $a=DB::table('historiqueformations')->where('historiqueformations.id_formation','=',$request->get('value'))->where('historiqueformations.id_users','=',Auth::user->id)->count();
    
   $date=date('d-m-Y');
   $date2=$x3;
     
     if($date<$date2){


     if($a==0){

    

    $historique= new Historiqueformation;

    $historique->id_users=Auth::user()->id;
    $historique->id_formation=$request->get('value');
    $historique->score_théorique=0;
     $historique->score_pratique=0;
     $historique->resultat_test=0;

     $historique->save();

     $email=Auth::user()->email;

      
      $test=$x2;
    $nom_entreprise=$x;
    $nom=Auth::user()->name;
    $Mail=$x1;

     Mail::send('emails.Notification_mise_a_niveau',['nom_entreprise'=>$nom_entreprise,'nom'=>$nom,'email'=>$email,'test'=>$test],function($message) use ($Mail){

 $message->to($Mail)->subject('Inscription_test_de_mise_à_niveau');


});

 $request->session()->flash('msg2','Inscription au Test de mise à niveau effectué');

     return view('home',compact('request'));



    }
    else {

    $request->session()->flash('msg1','Vous vous êtes déjà inscrit à ce test de mise à niveau');
    $formations= DB::table('formations')->where('formations.id_type','=',4)->get();

     return view('liste_test',compact('formations','request'));
	
}





     }
     else {



      $request->session()->flash('msg1','Délai dépassé pour ce Test');
    $formations= DB::table('formations')->where('formations.id_type','=',4)->get();

     return view('liste_test',compact('formations','request'));
	






	
}


    










    }
}
