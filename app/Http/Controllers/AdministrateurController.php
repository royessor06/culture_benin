<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Role;

class AdministrateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $administrateurs = Utilisateur::query()
            ->when($search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('prenom', 'like', "%{$search}%");
            })
            ->paginate(10);

        $utilisateurs = Utilisateur::whereHas('role', function ($query) {
            $query->where('nom', 'admin');
        })->get();

        return view('utilisateurs.administrateurs.index', compact('utilisateurs',"administrateurs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('utilisateurs.administrateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'           => 'required|string|max:255',
            'prenom'        => 'required|string|max:255',
            'email'         => 'required|email|unique:utilisateurs,email',
            'mot_de_passe'  => 'required|string|min:8',
        ]);

        $roleAdmin = Role::where('nom', 'admin')->first();

        if (!$roleAdmin) {
            return back()->withErrors(['role' => 'Le rôle administrateur est introuvable.']);
        }

        $administrateur = new Utilisateur();
        $administrateur->nom = $validated['nom'];
        $administrateur->prenom = $validated['prenom'];
        $administrateur->email = $validated['email'];
        $administrateur->mot_de_passe = bcrypt($validated['mot_de_passe']);
        $administrateur->role_id = $roleAdmin->id;
        $administrateur->save();

        return redirect()->route('administrateur.index')
                        ->with('success', 'Administrateur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.administrateurs.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $administrateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.administrateurs.edit',compact('administrateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom'           => 'required|string|max:255',
            'prenom'        => 'required|string|max:255',
            'email'         => 'required|email|unique:utilisateurs,email',
            'mot_de_passe'  => 'required|string|min:8',
        ]);

        $roleAdmin = Role::where('nom', 'admin')->first();

        if (!$roleAdmin) {
            return back()->withErrors(['role' => 'Le rôle administrateur est introuvable.']);
        }

        $administrateur=Utilisateur::findOrFail($id);

        $administrateur->nom = $validated['nom'];
        $administrateur->prenom = $validated['prenom'];
        $administrateur->email = $validated['email'];
        $administrateur->mot_de_passe = bcrypt($validated['mot_de_passe']);
        $administrateur->role_id = $roleAdmin->id;

        $administrateur->update($validated);

        return redirect()->route('administrateur.index')
            ->with('success', 'Administrateur ajouté avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('administrateur.index')
                        ->with('success', 'Admin supprimé avec succès');
    }
}
