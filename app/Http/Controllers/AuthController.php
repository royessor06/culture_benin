<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'mot_de_passe' => ['required']
        ]);

        $user = Utilisateur::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['mot_de_passe'], $user->mot_de_passe)) {

            Auth::login($user, $request->boolean('remember'));

            $request->session()->regenerate();

            $user->load('role');

            if($user->role) {
                switch($user->role->nom) {
                    case 'admin':
                        return redirect()->route('welcome');
                    case 'moderateur':
                        return redirect()->route('dashboard');
                    case 'contributeur':
                    case 'lecteur':
                        return redirect()->route('home');
                    default:
                        return redirect()->route('acceuil');
                }
            } else {
                return redirect()->route('acceuil');
            }
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects'
        ])->withInput($request->only('email'));
    }


    public function register(Request $request){
        $validated = $request->validate([
            'nom'=>'required|string|max:255',
            'prenom'=>'required|string|max:255',
            'email'=>'required|email|unique:utilisateurs,email',
            'mot_de_passe'=>'required|confirmed|min:8',
        ]);

        $roleAdmin = Role::where('nom', 'lecteur')->first();

        $user = Utilisateur::create([
            'nom'=>$validated['nom'],
            'prenom'=>$validated['prenom'],
            'email'=>$validated['email'],
            'mot_de_passe'=>bcrypt($validated['mot_de_passe']),
            'sexe' => 'X',
            'role_id'=>$roleAdmin->id,
        ]);

        Auth::login($user);
        return redirect()->route('login');
    }
}
