<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industria;
use App\Models\User;

class MainController extends Controller
{
    public function landing()
    {
        return view('template.landing');
    }

    public function index(Request $req){

        if ( $req->isMethod('post') ) {
           
            $id = $req->id;
            $First = User::find($id);    
            $First->first_reg = $req->first;
            $First->save();
            return "OK";
            
        }else{
            $industrias = [];
            foreach (Industria::orderBy('nombre')->get() as $industria) {
                $industrias[$industria->id] = $industria->nombre;
            }
            return view ('template.panel.index', ['industrias' => $industrias]);
        }    
    }

    public function duser(Request $req){

        if ( $req->isMethod('post') ) {
            
            $id = $req->id;
            $Users = User::find($id);
            $Users->delete();

            return response()->json([
                'dell' => '200',
                'state' => 'OK',
            ]);


        }


    }

}
