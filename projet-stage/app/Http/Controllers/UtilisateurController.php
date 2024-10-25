<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function index(){
        return view ('nouveau');
    }
    /* code ajout utilisateur*/
    public function ajout(Request $request){ 
        try {
            $request->validate([
                'immatricule' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed'],
            ], [
                'immatricule.required' => 'Le champ Immatriculation est requis',
                'name.required' => 'Le champ Nom est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères.',
                'email.required' => 'Le champ email est requis, doit être une chaîne de caractères, en minuscules.',
                'password.required' => 'Le champ mot de passe est requis, mot de passe ne correspond pas, ne respecte pas les critères de sécurité.'
            ]);
    
            $admin = Auth::user();
    
            $user = new Utilisateur();
            $user->immatricule = $request->immatricule;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->Cour_appel = $admin->Cour_appel;
            $user->TPI = $admin->TPI;
            $user->status = $request->status;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('dashboard');
    
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite: ' . $exception->getMessage());
        }
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
            ],[
                'immatricule' => 'Le champ Immatriculation est requis',
                'name' => 'Le champ Nom est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères.',
                'email' => 'Le champ email est requis, doit être une chaîne de caractères, en minuscules.',
                'Cour_appel' => 'Le champ Cour d\'appel est requis, doit être une chaîne de caractères, ne peut pas dépasser 255 caractères',
                'TPI' => 'Le champ TPI est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères.',
                'password' => 'Le champ mot de passe est requis, mot de passe ne correspond pas, ne respecte pas les critères de sécurité.'
            ]);


            $user = Utilisateur::find($request->id);
            if (!$user) {
                return redirect()->back()->with('error', 'Utilisateur introuvable.');
            }

            // $user =  Utilisateurs::find($request->id);
            $user ->immatricule =$request ->immatricule;
            $user->name =$request ->name;
            $user ->email =$request ->email;
            $user ->Cour_appel =$request ->Cour_appel;
            $user ->TPI =$request ->TPI;
            $user ->password =Hash::make($request->password);
            $user ->save();
            return redirect ('/dashboard');
        } catch (\Exception  $exception) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite: ' . $exception->getMessage());
        }
    }
     /*********************affichage des modifications*******************/
     public function dashboardmod($id){
        $user= Utilisateur::find($id);
        return view ('modifier', compact('user'));

     }
     /* pdf*/
     public function impression(){
        // Mijery ny province an'ny mpampiasa ankehitriny
        $TPI = Auth::user()->TPI;

        // Mampihatra ny fitiliana amin'ny province
        $listes = Utilisateur::where('TPI', $TPI)->get();

        return view('pdf', ['listes' => $listes]);
    }

    public function supprimer($id){
        $sup= Utilisateur::findOrFail($id);
        $sup->Delete();
        return redirect('/dashboard');
    }
    

    public function page()
    {
        $page = User::select('Cour_appel', DB::raw('count(*) as total'))
            ->groupBy('Cour_appel')
            ->get();

        return view('page', ['page' => $page]);
    }


}   
