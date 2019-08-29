<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Historiqueformation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Formation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class inscription_formation extends Controller
{

 public function __construct()
    {

        $this->middleware('auth');
    }


    public function valider(Request $request)

    {

     $control= DB::table('historiqueformations')->where('historiqueformations.id_users','=',Auth::user()->id)->where('historiqueformations.id_formation','=',$request->get('value'))->count();

     if($control==0){
     
   $var= DB::table('formations')->where('formations.id_formation','=',$request->get('value'))->get();

   foreach($var as $var1){

   $var1->nom_formation;
   $var1->nom_Institut;
    $var1->email;
    $var1->Date_debut;
}

 $date=date('d-m-Y');

$date2=$var1->Date_debut;

$var2=$var1->nom_formation;
$var3=$var1->nom_Institut;
$var4=$var1->email;

 if($date<$date2)

 {
 $nom2=Auth::user()->name;
$nom=$var3;
$formation=$var2;
$Mail=Auth::user()->email;
$email=$var4;

$id=$request->get('value');


    $historique= new Historiqueformation;
 

    $historique->id_users=Auth::user()->id;
     $historique->id_formation=$request->get('value');
     $historique->score_théorique=0;
     $historique->score_pratique=0;
     $historique->resultat_test=0;

 

$historique->save();

$request->session()->flash('Indication','Inscription effectuée avec succès');



Mail::send('emails.Notification_Formation',['nom'=>$nom,'nom2'=>$nom2,'form'=>$formation,'email'=>$Mail],function($message) use ($email){

 $message->to($email)->subject('Inscription');


});

return view('home',compact('request'));


 }
 else {

  $request->session()->flash('Erreur','Délai pour cette formation dépassé');

    $formations= DB::table('formations')->where('formations.id_type','=','1')->get();
     

        return view('liste_formations',compact('formations','request'));


	
}


     
     }
     else {
     $request->session()->flash('Erreur','vous vous êtes déja inscrit pour cette formation');

    $formations= DB::table('formations')->where('formations.id_type','=',1)->get();
     

        return view('liste_formations',compact('formations','request'));
	
}



    }


public function choix_update(Request $request){

$Formations= DB::table('formations')->where('formations.id_formation','=',$request->get('value'))->get();

    foreach( $Formations as $Formations)
    {

    $nom=$Formations->nom_formation;
     $nom2=$Formations->nom_Institut;
     $email=$Formations->email;
     $tel=$Formations->contact;
    }

    

    $id=$request->get('value');

    return view('Modify_form',compact('id','request','nom','nom2','email','tel'));






}


    public function update(Request $request){

   

if($request->input('Date_debut') < $request->input('Date_fin') )

{

 DB::table('formations')
            ->where('id_formation', $request->input('id'))
            ->update(['nom_Institut' => $request->input('nom2'),'nom_formation' => $request->input('nom'),'contact' => $request->input('tel'),'email' => $request->input('email'),'Date_debut' => $request->input('Date_debut'),'Date_fin' => $request->input('Date_fin')]);
            
            




            $formations= DB::table('formations')
    ->join('historiqueformations', 'historiqueformations.id_formation','=', 'formations.id_formation')
    ->where('formations.id_type','=',1)
    ->orwhere('formations.id_type','=',4)->get();

    $type=1;

    $request->session()->flash('Notification1','Modification effectuée');


        return view('liste_formations2',compact('formations','request','type'));

}
else {

 $formations= DB::table('formations')
    ->join('historiqueformations', 'historiqueformations.id_formation','=', 'formations.id_formation')
    ->where('formations.id_type','=',1)
    ->orwhere('formations.id_type','=',4)->get();

    $type=0;

    $request->session()->flash('Notification',' Date de début supérieure à la date de fin ');


        return view('liste_formations2',compact('formations','request','type'));


	
}






    }






}
