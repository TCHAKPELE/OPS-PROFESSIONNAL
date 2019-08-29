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



    public function list(Request $request){
     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     $Appels= DB::table('appel_d_offres')->get();
     

        return view('Admin.Liste_appel_doffre',compact('Appels','request','Exam'));



    }



    public function add(Request $request){

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     DB::table('appel_d_offres')
            ->where('id', $request->get('value'))
            ->update(['statut' => 1]);

$request->session()->flash('msg','Appel doffre autorisé');

 $Appels= DB::table('appel_d_offres')->get();

 $a=0;

        return view('Admin.Liste_appel_doffre',compact('Appels','request','a','Exam'));


    }


    public function cancel(Request $request){



     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     DB::table('appel_d_offres')
            ->where('id', $request->get('value'))
            ->update(['statut' => 0]);

$request->session()->flash('msg','Appel doffre Retiré');

 $Appels= DB::table('appel_d_offres')->get();
     $a=1;

        return view('Admin.Liste_appel_doffre',compact('Appels','request','a','Exam'));




    }



    public function list_cloture(Request $request){


     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

    $Appels= DB::table('appel_d_offres')->where('appel_d_offres.complet','=',1)->get();


    return view('Admin.Liste_close',compact('Appels','request','Exam'));


    }



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
