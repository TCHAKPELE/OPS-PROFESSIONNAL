<?php

namespace App\Http\Controllers;


use App\Appel_d_offre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class end_appel extends Controller
{
   public function Notification(){

   $Liste_OPS= DB::table('users')->where('users.Num_ops','<>',NULL)->get();

   foreach($Liste_OPS as $OPS )

   {
     Mail::send('emails.Notification_appel_offre',['nom'=>$OPS->name],function($message) use ($OPS){

 $message->to($OPS->email)->subject('Appel doffre disponible');


});

   }

 

   

   return view ('welcome');

   }
}
