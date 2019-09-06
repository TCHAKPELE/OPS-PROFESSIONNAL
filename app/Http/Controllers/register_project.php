<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class register_project extends Controller
{
    

   


     public function project_save2(Request $request)
    {

     $appel= DB::table('appel_d_offres')->where('appel_d_offres.num_place','=',1)->get();


        return view('creer_appel_doffre2',compact('appel','request'));
    }
}
