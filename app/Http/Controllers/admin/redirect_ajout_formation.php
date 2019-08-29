<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class redirect_ajout_formation extends Controller
{

 public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirect(Request $request)
    {

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();
    
    return view('Admin.formulaire_ajout_formations',compact('request','Exam'));

    }

    public function redirect_exam(Request $request)
    {

     $Exam = DB::table('formations')->where('formations.id_type','=',3)->get();
    
    return view('Admin.Formulaire_ajout_examen',compact('request','Exam'));

    }
}
