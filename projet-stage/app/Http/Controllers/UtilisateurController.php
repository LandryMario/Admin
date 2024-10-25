<?php

namespace App\Http\Controllers;

use App\Http\Middleware\utilisateurs;
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

    /*********************affichage des modifications*******************/
    public function editPage($id)
    {
        $user = Utilisateur::findOrFail($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur introuvable.');
        }
        
        return view('modifier')->with('user',$user);
    }

    /**********************modifications des utilisateurs*************/
    
    public function edit(Request $request){
        try {
            $request->validate([
                'immatricule' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $request->id],
            ],[
                'immatricule' => 'Le champ Immatriculation est requis',
                'name' => 'Le champ nom doit être une chaîne de caractères et ne doit pas dépasser 255 caractères.',
                'email' => 'Le champ email doit être une chaîne de caractères, en minuscules.',
            ]);

            $user = Utilisateur::modifier(
                $request->id,
                $request->name,
                $request->email,
                $request->immatricule, 
            );
            return redirect('dashboard')->with('success', 'Informations de l\'utilisateur mises à jour avec succès.')->with('user', $user);
        } catch (\Exception  $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    
    /*pdf*/
    public function impression(){
        $TPI = Auth::user()->TPI;

        $listes = Utilisateur::where('TPI', $TPI)->get();

        return view('pdf', ['listes' => $listes]);
    }

    public function destroy($id)
    {
        try {
            $user = Utilisateur::find($id);
            if (!$user) {
                return redirect()->back()->with('error', 'Utilisateur introuvable.');
            }
    
            $user->delete();
            return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    

    public function statistique()
    {
        $page = DB::table('users')
            ->groupBy('Cour_appel')
            ->where('usertype',2)
            ->count();

        return view('page');
    }


}   
