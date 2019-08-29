<?php



namespace App\Http\Controllers;

use App\Appel_d_offre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class save_project extends Controller
{
   

    public function add_projet(Request $request)
    {

     $a= DB::table('appel_d_offres')->where('appel_d_offres.nom_entreprise','=',$request->input('nom_entreprise'))->orwhere('appel_d_offres.num_identification','=',$request->input('num_identification'))->orwhere('appel_d_offres.tel','=',$request->input('tel'))->orwhere('appel_d_offres.email','=',$request->input('email'))->count();
     
     if($a>0)
     {
     $request->session()->flash('msg','Entreprise déja enrégistré veuillez changé d"option pour l"enregistrement de votre appel doffre ');
     return view('creer_appel_doffre',compact('request'));

     }
     else
     {

     $project=Appel_d_offre::all();

    $nom_entreprise=$request->input('nom_entreprise');
     $num_identification=$request->input('num_identification');
     $tel=$request->input('tel');
     $Date_debut=$request->input('Date_debut');
     $email=$request->input('email');
     $Date_fin=$request->input('Date_fin');
     $renumeration=$request->input('renumeration');

Appel_d_offre::create($request->all());

$id= DB::table('appel_d_offres')->where('appel_d_offres.num_identification','=',$num_identification)->get();
foreach($id as $id){

$var=Appel_d_offre::find($id->id);

}
$id_appel=$var->id;



$request->session()->flash('msg','Appel Enregistré veuillez répartir les agents par zone');

Mail::send('emails.confirmation_enregistrement_appel',['nom_entreprise'=>$nom_entreprise],function($message) use ($email){

 $message->to($email)->subject('Verified');


});



 return view('ajout_zone',compact('project','id_appel','request'));

     }


    

    }


    public function add_projet2(Request $request)

    {

     $project= new Appel_d_offre;

    $project->nom_entreprise=$request->input('nom_entreprise');

    $a= DB::table('appel_d_offres')->where('appel_d_offres.nom_entreprise','=',$project->nom_entreprise)->get();
    foreach($a as $a)
    {
    $a=max(array ($a))->num_place;

    }
    $b=$a;


     $tir= DB::table('appel_d_offres')->where('appel_d_offres.nom_entreprise','=',$project->nom_entreprise)->where('appel_d_offres.num_place','=',$b)->get();
     
     foreach($tir as $tir){

$tir1=$tir->num_identification;
$tir2=$tir->tel;
$tir3=$tir->email;
$tir4=$tir->num_place;
}


     $project->num_identification=$tir1;
     $project->tel=$tir2;


     $project->Date_debut=$request->input('Date_debut');
    $project->email=$tir3;
     $project->Date_fin=$request->input('Date_fin');
     $project->renumeration=$request->input('renumeration');
     $project->num_place=$tir4+1;

     
$project->save();

$id= DB::table('appel_d_offres')->where('appel_d_offres.num_identification','=',$project->num_identification)->where('appel_d_offres.num_place','=',$project->num_place)->get();
foreach($id as $id){

$var=Appel_d_offre::find($id->id);

}
$id_appel=$var->id;



$request->session()->flash('msg','Appel Enregistré veuillez répartir les agents par zone');
$nom_entreprise=$project->nom_entreprise;
$email=$project->email;

Mail::send('emails.confirmation_enregistrement_appel',['nom_entreprise'=>$nom_entreprise],function($message) use ($email){

 $message->to($email)->subject('Verified');


});



 return view('ajout_zone',compact('project','id_appel','request'));




    }

}
