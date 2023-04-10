<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\GetUser;
use App\Models\Product;
use App\Models\puser;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //Méthode pour la page d'acceuil
    
    
    
    public function index(){
        
        $users = User::all("role");
      //  $addresse = $user->addresse;
       
       // $query = "SELECT *  FROM users";
        return view('home', [
            'users' => $users
        ]);
    }


}
