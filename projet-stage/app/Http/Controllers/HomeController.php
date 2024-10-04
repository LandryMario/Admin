<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function liste(){
        try{
            $listes = Utilisateur::all();

            return view('dashboard')->with('listes', $listes);

        }catch(Exception $e){
            throw new Exception ($e->getMessage()); 
        }
    }
}
