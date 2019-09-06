<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Formation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ajout_formation extends Controller
{


public function __construct()
    {
        $this->middleware('auth');
    }


    public function fin_ajout(Request $request){

    $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

    $date=date('d-m-Y');

    if($request->input('Date_fin')>$request->input('Date_debut'))
    {
    
   

     if($request->input('Date_debut')>$date)
     {
     
      $a= DB::table('formations')->where('formations.nom_Institut','=',$request->input('nom_Institut'))->where('formations.contact','=',$request->input('contact'))->where('formations.email','=',$request->input('email'))->where('formations.nom_formation','=',$request->input('nom_formation'))->count();
    

    if($a<>0){

    $request->session()->flash('msg2','Cette formation existe déjà');

    return view('Admin.formulaire_ajout_formations',compact('request'));

    }
    else {

    $formations=new Formation;

    $formations->nom_Institut=$request->input('nom_Institut');
    $formations->contact=$request->input('contact');
    $formations->email=$request->input('email');
    $formations->Date_fin=$request->input('Date_fin');
    $formations->Date_debut=$request->input('Date_debut');
    $formations->nom_formation=$request->input('nom_formation');
    $formations->id_type=1;

    $formations->save();

    $request->session()->flash('msg','Formation ajouté avec succès ');

    $Liste_OPS= DB::table('users')->where('users.Num_ops','=', NULL)->where('users.roles','=','OPS')->get();

   foreach($Liste_OPS as $OPS )

   {
     Mail::send('emails.Notification_formation_disponible',['nom'=>$OPS->name],function($message) use ($OPS){

 $message->to($OPS->email)->subject('Formation disponible');


});

   }


    return view('Admin.formulaire_ajout_formations',compact('request','Exam'));

}



     }
     else{

      $request->session()->flash('msg2','Date déjà dépassé ');


      return view('Admin.formulaire_ajout_formations',compact('request','Exam'));

     }

    }
    else {
    $request->session()->flash('msg2','Date de fin supérieur à la date de début ');


      return view('Admin.formulaire_ajout_formations',compact('request','Exam'));


	
}






    }

    public function fin_ajout2(Request $request){

      $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

       $date=date('d-m-Y');

  if($request->input('Date_fin')>$request->input('Date_debut'))

    {
    
   
    

     if($request->input('Date_debut')>$date)
     {
     
      $a= DB::table('formations')->where('formations.nom_Institut','=',$request->input('nom_Institut'))->where('formations.contact','=',$request->input('contact'))->where('formations.email','=',$request->input('email'))->where('formations.nom_formation','=',$request->input('nom_formation'))->count();
    

    if($a<>0){

    $request->session()->flash('msg2','Cet examen existe déjà');

    return view('Admin.Formulaire_ajout_examen',compact('request','Exam'));

    }
    else {

    $formations=new Formation;

    $formations->nom_Institut=$request->input('nom_Institut');
    $formations->contact=$request->input('contact');
    $formations->email=$request->input('email');
    $formations->Date_fin=$request->input('Date_fin');
    $formations->Date_debut=$request->input('Date_debut');
    $formations->nom_formation=$request->input('nom_formation');

    if($request->input('lieu')==1)
    {
     $formations->id_type=3;
    }
    else {

     $formations->id_type=2;
	
}


   

    $formations->save();

    $request->session()->flash('msg','Examen ajouté avec succès ');

     $Liste_OPS= DB::table('users')->where('users.roles','=','OPS')->get();


   foreach($Liste_OPS as $OPS )

   {
     Mail::send('emails.Notification_Examen_disponible',['nom'=>$OPS->name],function($message) use ($OPS){

 $message->to($OPS->email)->subject('Examen disponible');


});

   }


    return view('Admin.Formulaire_ajout_examen',compact('request','Exam'));

}



     }
     else{

      $request->session()->flash('msg2','Date déjà dépassé ');


      return view('Admin.Formulaire_ajout_examen',compact('request','Exam'));

     }

    }
    else {
    $request->session()->flash('msg2','Date de fin supérieur à la date de début ');


      return view('Admin.Formulaire_ajout_examen',compact('request','Exam'));


	
}



    }


}
