<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use Illuminate\support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function utilisateur(){
        return view ('nouveau');
    }
    /* code ajout utilisateur*/
    public function ajout(Request $request){ 
        try {
            $request->validate([
                'im'=>'required',
                'nom'=>'required',
                'prenom'=>'required',
                'mail'=>'required',
                'appel'=>'required',
                'tpi'=>'required',
                'status'=>'required',
                'mdp'=>'required',
            ]);
            
            $user = new Utilisateurs();
            $user ->immatriculation =$request ->im;
            $user->nom =$request ->nom;
            $user ->prenom =$request ->prenom;
            $user ->email =$request ->mail;
            $user ->appel =$request ->appel;
            $user ->tribunal =$request ->tpi;
            $user ->status =$request ->status;
            $user ->password =Hash::make($request->mdp);
            $user ->save();
            return redirect ('/dashboard');
        } catch (\Exception  $exception) {
            throw new \exception ($exception->getMessage());
        }

    }
    /***********************affichage des liste************************/
    // public function dashboard(){
    //     $listes= Utilisateurs::all();
    //     return view ('dashboard', ['listes'=>$listes]);
    // }
    public function dashboard()
{
    // Mijery ny province an'ny mpampiasa ankehitriny
    $tribunal = Auth::user()->tribunal;

    // Mampihatra ny fitiliana amin'ny province
    $listes = Utilisateurs::where('tribunal', $tribunal)->get();

    return view('dashboard', ['listes' => $listes]);
}


    /**********************modifications des utilisateurs*************/
    
    public function modifications(Request $request){
        try {
            $request->validate([
                'id'=>'required',
                'im'=>'required',
                'nom'=>'required',
                'prenom'=>'required',
                'mail'=>'required',
                'appel'=>'required',
                'tpi'=>'required',
                'status'=>'required',
                'mdp'=>'required',
            ]);
            $user =  Utilisateurs::find($request->id);
            $user ->immatriculation =$request ->im;
            $user->nom =$request ->nom;
            $user ->prenom =$request ->prenom;
            $user ->email =$request ->mail;
            $user ->appel =$request ->appel;
            $user ->tribunal =$request ->tpi;
            $user ->status =$request ->status;
            $user ->password =Hash::make($request->mdp);
            $user ->update();
            return redirect ('/dashboard');
        } catch (\Exception  $exception) {
            throw new \exception ($exception->getMessage());
        }
    }
     /*********************affichage des modifications*******************/
     public function dashboardmod($id){
        $user= Utilisateurs::find($id);
        return view ('modifier', compact('user'));

     }
     /* pdf*/
     public function impression(){
        // $listes = Utilisateurs::all(); 
        // return view('pdf', compact('listes'));
        // Mijery ny province an'ny mpampiasa ankehitriny
    $tribunal = Auth::user()->tribunal;

    // Mampihatra ny fitiliana amin'ny province
    $listes = Utilisateurs::where('tribunal', $tribunal)->get();

    return view('pdf', ['listes' => $listes]);
     }

     /* ***************suppression************/
     public function supprimer($id){
        $sup= Utilisateurs::findOrFail($id);//Récupérer l'utilisarteur à supprimer//
        $sup->Delete();
        return redirect('/dashboard');
    }
    
    /* Statistique */ 

public function page()
{
    $page = User::select('appel', \DB::raw('count(*) as total'))
        ->groupBy('appel')
        ->get();

    return view('page', ['page' => $page]);
}


}   
