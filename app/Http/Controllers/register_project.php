<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class register_project extends Controller
{
    

    public function project_save(Request $request)
    {
        return view('creer_appel_doffre',compact('request'));
    }


     public function project_save2()
    {

     $appel= DB::table('appel_d_offres')->get();


        return view('creer_appel_doffre2',compact('appel'));
    }
}
