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

    $date=date('d-m-Y');
    
    $formations= DB::table('formations')->where('formations.id_formation','=',$request->get('value'))->get();

       foreach($formations as $formations){

       
   $x=$formations->nom_Institut;
    $x1=$formations->email;
    $x2=$formations->nom_formation;
    $x3=$formations->Date_debut;
    }


   $a=DB::table('historiqueformations')->where('historiqueformations.id_formation','=',$request->get('value'))->where('historiqueformations.id_users','=',Auth::user()->id)->count();
   

   $date2=$x3;
     
     if($date2<$date){


     if($a==0){

    

    $time=abs(strtotime($date2) - strtotime($date));
    
    $time=$time-86400;

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

 Mail::later($time,'emails.Notification_Rappel_mise_a_niveau',['nom'=>$nom,'test'=>$test],function($message) use ($email){

 $message->to($email)->subject('Rappel_Examen');


});

 $request->session()->flash('msg2','Inscription au Test de mise à niveau effectué');

     return view('home',compact('request'));



    }
    else {

    $request->session()->flash('msg1','Vous vous êtes déjà inscrit à ce test de mise à niveau');
    $formations= DB::table('formations')->where('formations.id_type','=',2)->get();

     return view('liste_test',compact('formations','request'));
	
}





     }
     else {



      $request->session()->flash('msg1','Délai dépassé pour ce Test');
    $formations= DB::table('formations')->where('formations.id_type','=',2)->get();

     return view('liste_test',compact('formations','request'));
	






	
}


    










    }
}
