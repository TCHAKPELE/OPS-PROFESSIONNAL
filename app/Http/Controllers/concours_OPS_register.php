<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Formation;

class concours_OPS_register extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }




     public function Choice(Request $request)
    {

    if($request->input('Date_fin') > $request->input('Date_debut'))
    {
     $control= DB::table('formations')->where('formations.nom_Institut','<>',$request->input('nom_Institut'))->where('formations.contact','=',$request->input('contact'))->orwhere('formations.email','=',$request->input('email'))->where('formations.nom_Institut','<>',$request->input('nom_Institut'))->count();
     

     if($control==0)

     {
     

    $formations=new Formation;

    $formations->nom_Institut=$request->input('nom_Institut');
    $formations->contact=$request->input('contact');
    $formations->email=$request->input('email');
    $formations->Date_fin=$request->input('Date_fin');
    $formations->Date_debut=$request->input('Date_debut');
    $formations->nom_formation=$request->input('nom_formation');
    $formations->id_type=4;

    $formations->save();

    $request->session()->flash('msg','Veuillez choisir un Examen OPS auquel vous enrégistrer');

$b= DB::table('formations')->where('formations.id_type','=',3)->get();

    return view('Liste_exam_ops',compact('request','b'));





     }
     else
     {

      $request->session()->flash('msg','Email ou contact Dejà Utilisé ');


      return view ('renseigner_formation',compact('request'));

     }


    }
    else {

     $request->session()->flash('msg','Erreur la Date de début supérieur à la date de fin de formation ');


      return view ('renseigner_formation',compact('request'));
	
}




    
   

        
    }


}
