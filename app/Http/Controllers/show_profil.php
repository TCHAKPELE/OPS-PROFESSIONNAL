<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Historiqueformation;

class show_profil extends Controller
{
   public function informations(Request $request){
   $date=date('d-m-Y');
    

   $photo= DB::table('users')->where('users.id','=',Auth::user()->id)->get();

   foreach($photo as $photo){
   $photo=$photo->Photo_profil;
   }
   

   $lien=$photo;
   

   if(Auth::user()->Num_ops==null)
   {

   $titre='Candidat OPS';
   }
   else {

   $titre='OPS';
	
}



   $nbr_ops= DB::table('users')->where('users.Num_ops','<>',null)->where('users.roles','=','OPS')->count();
 

   $moyenne= DB::table('historiqueformations')->where('historiqueformations.id_users','=',Auth::user()->id)->where('historiqueformations.Exam','=',1)->get();

   
   
     foreach($moyenne as $moyenne)
     {
      $note1=$moyenne->score_théorique;
       $note2=$moyenne->score_pratique;
     $moyenne=$moyenne->resultat_test;

     }

     $x=DB::table('historiqueformations')->where('historiqueformations.id_users','=',Auth::user()->id)->where('historiqueformations.Exam','=',1)->count();


     if($x==0){


     $moyenne=2;
     }
     
      
      
     
     
     $moyenne2 = DB::table('historiqueformations')->where('historiqueformations.id_users','=',Auth::user()->id)->where('historiqueformations.Exam','=',1)->count();
      

      if( $moyenne2 ==1)
      {
       $place= DB::table('historiqueformations')->where('historiqueformations.Exam','=',1)->where('historiqueformations.resultat_test','>',$moyenne)->count();
       
       $place=$place+1;

   return view('Profils_users',compact('request','lien','date','nbr_ops','place','titre','moyenne','note1','note2'));


      }
      else {

      $place= 'Non classé';

   return view('Profils_users',compact('request','lien','date','nbr_ops','place','titre','moyenne','note1','note2'));



}

    

   }


   public function change(Request $request){
   $date=date('d-m-Y');
  
   $image = $request->input('file');
   
        $nomFichier = $image;
        $chemin = 'http://localhost:1025/project-ops/resources/img/';
      
        $picture = $chemin . $nomFichier;
        
        
   DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['Photo_profil' => $picture]);

$photo= DB::table('users')->where('users.id','=',Auth::user()->id)->get();

   foreach($photo as $photo){
   $photo=$photo->Photo_profil;
   }

   $lien=$photo;
  

   if(Auth::user()->Num_ops==null)
   {

   $titre='Candidat OPS';
   }
   else {

   $titre='OPS';
	
}



   $nbr_ops= DB::table('users')->where('users.Num_ops','<>',null)->where('users.roles','=','OPS')->count();
 

   $moyenne= DB::table('historiqueformations')->where('historiqueformations.id_users','=',Auth::user()->id)->where('historiqueformations.Exam','=',1)->get();
    
     foreach($moyenne as $moyenne)
     {
      $note1=$moyenne->score_théorique;
       $note2=$moyenne->score_pratique;
     $moyenne=$moyenne->resultat_test;
    
      
     }

      $moyenne2 = DB::table('historiqueformations')->where('historiqueformations.id_users','=',Auth::user()->id)->where('historiqueformations.Exam','=',1)->count();
      

      if( $moyenne2 ==1)
      {
       $place= DB::table('historiqueformations')->where('historiqueformations.Exam','=',1)->where('historiqueformations.resultat_test','>',$moyenne)->count();
       $place=$place+1;

   return view('Profils_users',compact('request','lien','date','nbr_ops','place','titre','moyenne','note1','note2'));


      }
      else {

      $place= 'Non classé';

   return view('Profils_users',compact('request','lien','date','nbr_ops','place','titre','moyenne','note1','note2'));




}
}
}
