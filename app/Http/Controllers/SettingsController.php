<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('settings.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Vérifier le mot de passe actuel
        if (!Hash::check($request->current_password, $user->mot_de_passe)) {
            return back()->withErrors(['current_password' => 'Mot de passe actuel incorrect.']);
        }

        // Mettre à jour le mot de passe
        $user->update([
            'mot_de_passe' => Hash::make($request->new_password)
        ]);

        return redirect()->route('settings.index')
            ->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
