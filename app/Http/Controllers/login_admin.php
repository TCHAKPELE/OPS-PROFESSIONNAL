<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class login_admin extends Controller
{


 public function insert(Request $request)
    {


    return view ('authentification_entreprise',compact('request'));
    }



    public function controle(Request $request)

    {

    $control=DB::table('appel_d_offres')->where('appel_d_offres.mot_de_passe','=',$request->input('password'))->where('appel_d_offres.email','=',$request->input('email'))->count();


    if ($control==1)

    {

    $appel= DB::table('appel_d_offres')->where('appel_d_offres.email','=',$request->input('email'))->get();


        return view('creer_appel_doffre2',compact('appel','request'));



    }
    else {

 $request->session()->flash('msg','Email ou mot de passe Incorrect');

     return view ('authentification_entreprise',compact('request'));


	
}

    }




    public function control(Request $request)
    {


    return view ('Admin.identified',compact('request'));
    }

 public function control2(Request $request)
    {

    $var= DB::table('users')->where('users.Question_secrète','=',$request->input('Secret'))->count();
    

    

    if($var>=1){
    

    return view ('Admin.login');

    }
    else {

    $request->session()->flash('msg','Mauvaise réponse ');
     return view ('Admin.identified',compact('request'));

}


   
    }



}
