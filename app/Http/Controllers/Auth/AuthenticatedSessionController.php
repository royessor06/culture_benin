<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Utilisateur::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->mot_de_passe)) {
            return back()->withErrors([
                'email' => 'Ces identifiants sont incorrects.',
            ]);
        }

        // Optionnel : vérifier si c'est admin
        if ($user->role_id != 1) { // par exemple id_role=1 = admin
            return back()->withErrors([
                'email' => 'Vous n\'êtes pas autorisé à accéder à l\'admin.',
            ]);
        }

        return redirect()->route('welcome');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        return redirect('/login');
    }
}
