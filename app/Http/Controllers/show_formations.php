<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Formation;

class show_formations extends Controller
{

 public function __construct()
    {
        $this->middleware('auth');
    }




     public function show(Request $request)
    {
    $formations= DB::table('formations')->where('formations.id_type','=','1')->get();
     

        return view('liste_formations',compact('formations','request'));
    }

    public function show_mine(Request $request)

    {

    $formations= DB::table('formations')
    ->join('historiqueformations', 'historiqueformations.id_formation','=', 'formations.id_formation')
     ->join('users', 'users.id','=', 'historiqueformations.id_users')
    ->where('formations.id_type','=',1)
    ->where('users.id','=',Auth::user()->id)
    ->orwhere('formations.id_type','=',4)->get();

    $type=0;

        return view('liste_formations2',compact('formations','request','type'));
    }
}
