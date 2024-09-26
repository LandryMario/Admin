<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use Illuminate\Support\Facades\DB;
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
                'immatricule' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'Cour_appel' => ['required', 'string','max:255'],
                'TPI' => ['required', 'string','max:255'],
                'password' => ['required', 'confirmed'],
                'usertype' => ['required']
            ], [
                'immatricule' => 'Le champ Immatriculation est requis',
                'name' => 'Le champ Nom est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères.',
                'email' => 'Le champ email est requis, doit être une chaîne de caractères, en minuscules.',
                'Cour_appel' => 'Le champ Cour d\'appel est requis, doit être une chaîne de caractères, ne peut pas dépasser 255 caractères',
                'TPI' => 'Le champ TPI est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères.',
                'password' => 'Le champ mot de passe est requis, mot de passe ne correspond pas, ne respecte pas les critères de sécurité.'
            ]);
    
            
            $user = new Utilisateurs();
            $user ->immatricule =$request ->immatricule;
            $user->name =$request ->name;
            $user ->email =$request ->email;
            $user ->Cour_appel =$request ->Cour_appel;
            $user ->TPI =$request ->TPI;
            $user ->status =$request ->status;
            $user ->password =Hash::make($request->password);
            $user->usertype == 2;

            $user ->save();
            return redirect ('/dashboard');

        } catch (\Exception  $exception) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite: ' . $exception->getMessage());
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
    $tribunal = Auth::user()->TPI;

    // Mampihatra ny fitiliana amin'ny province
    $listes = Utilisateurs::where('tribunal', $tribunal)->get();

    return view('dashboard', ['listes' => $listes]);
}


    /**********************modifications des utilisateurs*************/
    
    public function modifications(Request $request){
        try {
            $request->validate([
                'immatricule' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'Cour_appel' => ['required', 'string','max:255'],
                'TPI' => ['required', 'string','max:255'],
                'password' => ['required', 'confirmed'],
            ]);
            $user =  Utilisateurs::find($request->id);
            $user ->immatricule =$request ->immatricule;
            $user->name =$request ->name;
            $user ->email =$request ->email;
            $user ->Cour_appel =$request ->Cour_appel;
            $user ->TPI =$request ->TPI;
            $user ->status =$request ->status;
            $user ->password =Hash::make($request->password);
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
        // Mijery ny province an'ny mpampiasa ankehitriny
        $tribunal = Auth::user()->TPI;

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
    $page = User::select('Cour_appel', DB::raw('count(*) as total'))
        ->groupBy('Cour_appel')
        ->get();

    return view('page', ['page' => $page]);
}


}   
