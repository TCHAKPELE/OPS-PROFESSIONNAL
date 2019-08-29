<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class find_formation extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




     public function write(Request $request)

    {

    $a= DB::table('historiqueformations')->where('historiqueformations.id_users','=',Auth::user()->id)->count();

    if($a>0)

    {

     $request->session()->flash('msg','Veuillez choisir un Examen OPS auquel vous enrégistrer');


    $b= DB::table('formations')->where('formations.id_type','=',3)->get();

    return view('Liste_exam_ops',compact('request','b'));


    }

    else {

	return view('renseigner_formation',compact('request'));
}


        
    }
}
