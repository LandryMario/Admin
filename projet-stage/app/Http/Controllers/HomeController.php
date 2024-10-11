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
            $listes = DB::table('users')->where('usertype', 2)->where('tpi_id', Auth::user()->tpi_id)->get();

            return view('dashboard')->with('listes', $listes);

        }catch(Exception $e){
            throw new Exception ($e->getMessage()); 
        }
    }
}
