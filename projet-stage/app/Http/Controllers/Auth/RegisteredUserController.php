<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'Cour_appel' =>['required','string','max:255'],
                'TPI' =>['required','string','max:255'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
    
            ],[
            'name' => 'Le champ Nom est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères.',
            'email' => 'Le champ email est requis, doit être une chaîne de caractères, en minuscules.',
            'Cour_appel' => 'Le champ Cour d\'appel est requis, doit être une chaîne de caractères, ne peut pas dépasser 255 caractères',
            'TPI' => 'Le champ TPI est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères.',
            'password' => 'Le champ mot de passe est requis, mot de passe ne correspond pas, ne respecte pas les critères de sécurité.'
            ]);
    

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'Cour_appel'=>$request->Cour_appel,
                'TPI'=>$request->TPI,
                'password' => Hash::make($request->password),
            ]);
    
            event(new Registered($user));
    
            Auth::login($user);
    
            return redirect(route('dashboard', absolute: false));   
        }catch(Exception $e){

        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
