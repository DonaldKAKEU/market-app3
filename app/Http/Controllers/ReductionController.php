<?php

namespace App\Http\Controllers;

use App\Models\Reduction;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Void_;

class ReductionController extends Controller
{

    public function liste_abonner(){
        $liste = Reduction::all();
        $user = $liste->user();
        
        return view('reduction.liste_abonner', $liste, $user);
    }
    public function new(Request $request){
        
        $name_user = $request->input('name_user');
        $user_id = User::getIdByName($name_user); // id du client qui profite de la reduction
        Reduction::new($request, $user_id);
        redirect()->route('reduction.index');
    }

    /**permet de get tout les informations concernant les rductions d'un user */
    public function getReductionByNameUser($user_name){
        $user_id = User::getIdByName($user_name);
        $reduction = Reduction::where("user_id", $user_id);
        return view("reduction.showOne", $reduction);
    }
}
