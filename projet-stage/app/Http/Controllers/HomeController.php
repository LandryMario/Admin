<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function liste(){
        try{
            $admin = Auth::user();
            $tpi_id = $admin->tpi_id;
        
            // Récupérer les utilisateurs
            $listes = DB::table('users')
                        ->where('tpi_id', $tpi_id)
                        ->where('usertype', 2)
                        ->get();

            return view('dashboard')->with('listes', $listes);

        }catch(Exception $e){
            throw new Exception ($e->getMessage()); 
        }
    }
}
