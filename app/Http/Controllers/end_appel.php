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

   $Liste_Admin= DB::table('users')->where('users.roles','=','admin')->get();

   foreach($Liste_Admin as $Admin )

   {
     Mail::send('emails.Notification_appel_offre_admin',['nom'=>$Admin->name],function($message) use ($Admin){

 $message->to($Admin->email)->subject('Appel doffre ajoutée');


});

   }

 

   

   return view ('welcome');

   }
}
