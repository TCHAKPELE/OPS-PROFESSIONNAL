<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
    $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

    if(Auth::user()->roles=='OPS')
    {
    return view('home',compact('request'));

    }
    else {

     return view('Admin.home',compact('request','Exam'));
	
}


        
    }

 public function index2(Request $request)
    {

    $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();

        return view('Admin.home',compact('request','Exam'));
    }
    
}
