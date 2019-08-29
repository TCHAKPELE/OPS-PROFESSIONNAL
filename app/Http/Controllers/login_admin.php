<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class login_admin extends Controller
{
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
