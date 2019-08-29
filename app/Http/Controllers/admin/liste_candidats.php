<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appel_d_offre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class liste_candidats extends Controller
{



  public function __construct()
    {
        $this->middleware('auth');
    }



    public function vue(Request $request){

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     $candidats= DB::table('users')
     
     ->join('historiqueformations','historiqueformations.id_users','=', 'users.id')
     ->join('formations','formations.id_formation','=','historiqueformations.id_formation')
     ->where('users.inscription','=', 1)
     ->where('users.Num_ops','=',null)
     ->where('formations.id_type','=',3)->get();

    
     $nbr= DB::table('users')->where('users.inscription','=',1)->where('users.Num_ops','=',null)->count();

     if( $nbr==0)
     {

     $request->session()->flash('msg','Aucun candidat inscrit');

     }
     

        return view('Admin.liste_candidats OPS',compact('candidats','request','Exam'));




    }


    public function enter(Request $request){

    $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

    $candidats= DB::table('users')->where('users.id','=',$request->get('value'))->get();

    foreach( $candidats as $candidats)
    {

    $nom=$candidats->name;
     $prenom=$candidats->firstname;
     $email=$candidats->email;
    }

    

    $id=$request->get('value');

    return view('Admin.entrer_note',compact('id','request','nom','prenom','email','Exam'));


    }


    public function save(Request $request)

    {
    $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

    $moyenne=(30*$request->input('score_théorique')/100)+(70*$request->input('score_pratique')/100);

    $num_matricule='OPS00'.$request->input('id');

    $mail=$request->input('email');

    DB::table('historiqueformations')
            ->where('id_users', $request->input('id'))
            ->where('Exam', 1)
            ->update(['score_théorique' => $request->input('score_théorique')]);


 DB::table('historiqueformations')
            ->where('id_users', $request->input('id'))
            ->where('Exam', 1)
            ->update(['score_pratique' => $request->input('score_pratique')]);




 DB::table('historiqueformations')
            ->where('id_users', $request->input('id'))
            ->where('Exam', 1)
            ->update(['resultat_test' => $moyenne]);

if( $moyenne>=12){

DB::table('users')
            ->where('id', $request->input('id'))
            ->update(['Num_ops' => $num_matricule]);



            Mail::send('emails.Notification_reussite',['nom'=>$request->input('nom')],function($message) use ($mail){

 $message->to($mail)->subject('Resultat Exam_OPS');


});


}
else {

DB::table('users')
            ->where('id_users', $request->input('id'))
            ->update(['inscription' => 0]);



            Mail::send('emails.Notification_Echec',['nom'=>$request->input('nom')],function($message) use ($mail){

 $message->to($mail)->subject('Resultat Exam_OPS');


});




	
}

 $candidats= DB::table('users')->where('users.inscription','=',1)->where('users.Num_ops','=',null)->get();

 $request->session()->flash('msg','Saisi des notes réussie');

 return view('Admin.liste_candidats OPS',compact('candidats','request','Exam'));

    }






    public function vue_note(Request $request){
    $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     $candidats= DB::table('users')
     
     ->join('historiqueformations','historiqueformations.id_users','=', 'users.id')
     ->join('formations','formations.id_formation','=','historiqueformations.id_formation')
     ->where('formations.id_type','=',3)->get();

     



    return view('Admin.liste_candidats_update',compact('request','candidats','Exam'));


    }


    public function modify_note1(Request $request)


{

 $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

$candidats= DB::table('users')->where('users.id','=',$request->get('value'))->get();

    foreach( $candidats as $candidats)
    {

    $nom=$candidats->name;
     $prenom=$candidats->firstname;
     $email=$candidats->email;
    }

    

    $id=$request->get('value');

    return view('Admin.entrer_note2',compact('id','request','nom','prenom','email','Exam'));











}



    public function modify_note(Request $request)

    {

    $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

$note1=$request->input('score_théorique')+0;
$note2=$request->input('score_pratique')+0;

   

     DB::table('historiqueformations')
            ->where('id_users', $request->input('id'))
            ->where('Exam', 1)
            ->update(['score_théorique' =>$note1]);

           
            DB::table('historiqueformations')
            ->where('id_users', $request->input('id'))
            ->where('Exam', 1)
            ->update(['score_pratique' =>$note2]);

            $moyenne=(30*$note1/100)+(70*$note2/100);



            DB::table('historiqueformations')
            ->where('id_users', $request->input('id'))
            ->where('Exam', 1)
            ->update(['resultat_test' => $moyenne]);

            if($moyenne>=12)

            {

            $new_Num='OPS00'.$request->input('id');

             DB::table('users')
            ->where('id', $request->input('id'))
            ->update(['Num_ops' =>$new_Num]);




            }


$request->session()->flash('msg','Note modifiée avec succès');



    $candidats= DB::table('users')
     
     ->join('historiqueformations','historiqueformations.id_users','=', 'users.id')
     ->join('formations','formations.id_formation','=','historiqueformations.id_formation')
     ->where('formations.id_type','=',3)->get();






    return view('Admin.liste_candidats_update',compact('request','candidats','Exam'));



    }




    public function present(Request $request)

    {

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

     $liste_candidats = DB::table('users')
     ->join('historiqueformations','historiqueformations.id_users','=', 'users.id')
     ->where('historiqueformations.id_formation','=',$request->get('value'))->get();


     return view('Admin.Liste_concours',compact('request','liste_candidats','Exam'));

    }


}
