<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class show_project extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




     public function job(Request $request)
    {
    
    if(Auth::user()->Num_ops==NULL){

    $request->session()->flash('message','Vous êtes pas encore autorisé à avoir accès aux appels d"offres');
    

    return view('liste_appel_doffre2',compact('request'));
    }
    else {
	
     $projects= DB::table('appel_d_offres')->where('appel_d_offres.statut','=',1)->get();

return view('liste_appel_doffre',compact('projects','request'));
        
    }
}
}
