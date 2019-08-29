<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class test_show extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }




     public function test(Request $request)
    {
    
    if(Auth::user()->Num_ops=="NULL"){

    $request->session()->flash('message','Vous êtes pas encore autorisé à avoir accès aux tests de mise à niveau');

    return view('liste_test2',compact('request'));
    }
    else {
	
     $formations= DB::table('formations')->where('formations.id_type','=',2)->get();

     $var= DB::table('formations')->where('formations.id_type','=',2)->count();

     if($var==0){

     $request->session()->flash('message','Aucun test de mise à niveau disponible');

     return view('liste_test',compact('formations','request'));

     }

     else {



     return view('liste_test',compact('formations','request'));
	
}


        
    }
}
}
