<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appel_d_offre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class liste_offre extends Controller
{


public function __construct()
    {
        $this->middleware('auth');
    }



    // Fonction pour afficher la liste des appels d'offres annoncé par les entreprises Externes via la plateforme //



    public function list(Request $request){
     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     $Appels= DB::table('appel_d_offres')->get();
     

        return view('Admin.Liste_appel_doffre',compact('Appels','request','Exam'));



    }



    // Fonction pour afficher la liste des demandes d'adhesion par les entreprises Externes via la plateforme //



    public function list_entreprise(Request $request){
     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     $Appels= DB::table('appel_d_offres')->where('appel_d_offres.statut2','=',0)->get();
     

        return view('Admin.Liste_adhesion',compact('Appels','request','Exam'));



    }

 // Fonction pour publier un appel d'offre dans la communauté des OPS de la plateforme //



    public function add(Request $request){

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     DB::table('appel_d_offres')
            ->where('id', $request->get('value'))
            ->update(['statut' => 1]);

$request->session()->flash('msg','Appel doffre autorisé');

 $Appels= DB::table('appel_d_offres')->get();

 $a=0;

  $Liste_OPS= DB::table('users')->where('users.Num_ops','<>',NULL)->get();

   foreach($Liste_OPS as $OPS )

   {
     Mail::send('emails.Notification_appel_offre',['nom'=>$OPS->name],function($message) use ($OPS){

 $message->to($OPS->email)->subject('Appel doffre disponible');


});

        return view('Admin.Liste_appel_doffre',compact('Appels','request','a','Exam'));


    }

}


// Fonction pour Autoriser l'adhesion d'une entreprise //



public function add2(Request $request){

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     DB::table('appel_d_offres')
            ->where('id', $request->get('value'))
            ->update(['statut2' => 2]);

             DB::table('appel_d_offres')
            ->where('id', $request->get('value'))
            ->update(['mot_de_passe' => 'TG00'.$request->get('value')]);

             DB::table('appel_d_offres')
            ->where('id', $request->get('value'))
            ->update(['num_place' =>0]);

$request->session()->flash('msg','Adhesion autorisé');

$Appels= DB::table('appel_d_offres')->where('appel_d_offres.statut2','=',0)->get();

 $a=0;

  $Liste_OPS= DB::table('appel_d_offres')->where('appel_d_offres.id','=',$request->get('value'))->get();

   foreach($Liste_OPS as $OPS )

   {
     Mail::send('emails.Notification_adhesion_success',['nom'=>$OPS->nom_entreprise,'password'=>$OPS->mot_de_passe],function($message) use ($OPS){

 $message->to($OPS->email)->subject('Adhesion acceptée');


});

        return view('Admin.Liste_adhesion',compact('Appels','request','a','Exam'));


    }

}



// Fonction pour rejeter l'adhesion d'une entreprise //


public function cancel2(Request $request){

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     DB::table('appel_d_offres')
            ->where('id', $request->get('value'))
            ->update(['statut2' => 1]);

$request->session()->flash('msg','Adhesion refusé');

$Appels= DB::table('appel_d_offres')->where('appel_d_offres.statut2','=',0)->get();

 $a=1;

  $Liste_OPS= DB::table('appel_d_offres')->where('appel_d_offres.id','=',$request->get('value'))->get();

   foreach($Liste_OPS as $OPS )

   {
     Mail::send('emails.Notification_adhesion_echec',['nom'=>$OPS->nom_entreprise],function($message) use ($OPS){

 $message->to($OPS->email)->subject('Adhesion Refusée');


});

        return view('Admin.Liste_adhesion',compact('Appels','request','a','Exam'));


    }

}



    // Fonction pour retirer un appel d'offre dans la communauté des OPS de la plateforme //



    public function cancel(Request $request)
    {



     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     DB::table('appel_d_offres')
            ->where('id', $request->get('value'))
            ->update(['statut' => 0]);

$request->session()->flash('msg','Appel doffre Retiré');

 $Appels= DB::table('appel_d_offres')->get();
     $a=1;

        return view('Admin.Liste_appel_doffre',compact('Appels','request','a','Exam'));




    }



    // Fonction pour afficher la liste des appels d'offres dont le nombre d'OPS recherché est atteint //


    public function list_cloture(Request $request){


     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

    $Appels= DB::table('appel_d_offres')->where('appel_d_offres.complet','=',1)->get();


    return view('Admin.Liste_close',compact('Appels','request','Exam'));


    }


    // Fonction pour Imprimer la liste des OPS ayant postulé pour un appel d'offre //

    public function print(Request $request)

    {

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();
    

$OPS= DB::table('users')
->join('historiqueselections', 'historiqueselections.id', '=', 'users.id')
->join('attribution_zones', 'attribution_zones.num_zone', '=', 'historiqueselections.num_zone')
->where('historiqueselections.num_offre','=',$request->get('value'))->get();

$test=DB::table('appel_d_offres')->where('appel_d_offres.id','=',$request->get('value'))->get();

foreach($test as $test){

$nom=$test->nom_entreprise;
$test=$test->email;



}

$var=$request->get('value');


return view('Admin.Liste_close_OPS',compact('OPS','request','test','nom','var','Exam'));






    }





    // Fonction pour Imprimer la liste d'attente des OPS ayant postulé pour un appel d'offre //



     public function print2(Request $request)

    {

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();


$OPS= DB::table('users')
->join('historiqueselections', 'historiqueselections.id', '=', 'users.id')
->where('historiqueselections.num_offre','=',$request->get('value'))
->where('historiqueselections.num_zone','=',0)->get();

$test=DB::table('appel_d_offres')->where('appel_d_offres.id','=',$request->get('value'))->get();

foreach($test as $test){

$nom=$test->nom_entreprise;
$test=$test->email;



}

$var=$request->get('value');


return view('Admin.Liste_close_OPS2',compact('OPS','request','test','nom','var','Exam'));






    }



// Fonction pour l'envoie de la liste des OPS ayant postulé pour l'appel d'offre à l'entreprise //


    public function send(Request $request)

{

 $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();



if($request->input('file') <> null)

{

$liste = $request->input('file');
   
        $nomFichier = $liste;
        $chemin = 'http://localhost:1025/project-ops/resources/pdf/';
      
        $doc = $chemin . $nomFichier;

        

$nom=$request->input('nom');

$mail=$request->input('email');




 Mail::send('emails.Notification_appel_offre_close',['nom'=>$nom],function($message) use ($mail,$doc){

 $message->to($mail)->subject('Candidature_OPS');
 $message->attach($doc);


});

$Appels= DB::table('appel_d_offres')->where('appel_d_offres.complet','=',1)->get();

$request->session()->flash('msg','Liste envoyé');

    return view('Admin.Liste_close',compact('Appels','request','Exam'));



}

else {

$OPS= DB::table('users')
->join('historiqueselections', 'historiqueselections.id', '=', 'users.id')
->where('historiqueselections.num_offre','=',$request->input('var'))->get();

$test=DB::table('appel_d_offres')->where('appel_d_offres.id','=',$request->input('var'))->get();



foreach($test as $test){

$nom=$test->nom_entreprise;
$test=$test->email;



}

$var=$request->input('var');

$request->session()->flash('msg','Veulliez selectionné un fichier');


return view('Admin.Liste_close_OPS',compact('OPS','request','test','nom','var','Exam'));





	
}



}


// Fonction pour l'envoie de la liste d'attente des OPS ayant postulé pour l'appel d'offre à l'entreprise //



    public function send2(Request $request)

{


 $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();


if($request->input('file') <> null)

{


$liste = $request->input('file');
   
        $nomFichier = $liste;
        $chemin = 'http://localhost:1025/project-ops/resources/pdf/';
      
        $doc = $chemin . $nomFichier;

        

$nom=$request->input('nom');

$mail=$request->input('email');




 Mail::send('emails.Notification_appel_offre_close2',['nom'=>$nom],function($message) use ($mail,$doc){

 $message->to($mail)->subject('Liste d_attente');
 $message->attach($doc);


});

$Appels= DB::table('appel_d_offres')->where('appel_d_offres.complet','=',1)->get();

$request->session()->flash('msg','Liste envoyé');

    return view('Admin.Liste_close',compact('Appels','request','Exam'));



}

else {

$OPS= DB::table('users')
->join('historiqueselections', 'historiqueselections.id', '=', 'users.id')
->where('historiqueselections.num_offre','=',$request->get('value'))
->where('historiqueselections.num_zone','=',0)->get();

$test=DB::table('appel_d_offres')->where('appel_d_offres.id','=',$request->get('value'))->get();

foreach($test as $test){

$nom=$test->nom_entreprise;
$test=$test->email;



}

$var=$request->get('value');


return view('Admin.Liste_close_OPS2',compact('OPS','request','test','nom','var','Exam'));





	
}



}


}
