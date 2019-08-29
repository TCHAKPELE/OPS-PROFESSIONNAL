<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historiqueformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Formation;

class valid_OPS extends Controller
{
    public function concour_ops(Request $request)

    {

    $formations= DB::table('formations')->where('formations.id_formation','=',$request->get('value'))->get();

       foreach($formations as $formations){

       
   $x=$formations->nom_Institut;
    $x1=$formations->email;
     $x2=$formations->Date_debut;
    }

    $date=date('d-m-Y');


    if($date<$x2)

    {
    $a=Auth::user()->inscription;
    
   
     

    if($a==false){

    

    $historique= new Historiqueformation;

    $historique->id_users=Auth::user()->id;
    $historique->id_formation=$request->get('value');
    $historique->score_théorique=0;
     $historique->score_pratique=0;
     $historique->resultat_test=0;

     $historique->save();


     DB::table('historiqueformations')
            ->where('id_users', Auth::user()->id)
            ->where('id_formation', $request->get('value'))
            ->update(['Exam' => 1]);

     $email=Auth::user()->email;

      

    $nom_entreprise=$x;
    $nom=Auth::user()->name;
    $Mail=$x1;

     Mail::send('emails.Notification_concours_ops',['nom_entreprise'=>$nom_entreprise,'nom'=>$nom,'email'=>$email],function($message) use ($Mail){

 $message->to($Mail)->subject('Candidature_OPS');


});

 $request->session()->flash('msg2','Inscription au concour OPS Effectuée');

  $user = User::find(Auth::user()->id);
$user->inscription = true;
$user->save();

     return view('home',compact('request'));



    }
    else {
    
    
   

    $request->session()->flash('msg2','Vous vous êtes déjà inscrit à un concours OPS');
    $b= DB::table('formations')->where('formations.id_type','=',3)->get();

    return view('liste_exam_ops',compact('request','b'));
	
}

    }
    else {

     $request->session()->flash('msg2','Delai depassé pour ce concours OPS');
    $b= DB::table('formations')->where('formations.id_type','=',3)->get();

    return view('liste_exam_ops',compact('request','b'));



	
}


   



    }
}
