<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Role;

class ModerateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $moderateurs = Utilisateur::query()
            ->when($search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('prenom', 'like', "%{$search}%");
            })
            ->paginate(10);

        $utilisateurs = Utilisateur::whereHas('role', function ($query) {
            $query->where('nom', 'Modérateur');
        })->get();

        return view('utilisateurs.moderateurs.index', compact('utilisateurs','moderateurs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('utilisateurs.moderateurs.create');
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

        // 1️⃣ Récupérer l'id du rôle administrateur
        $roleAdmin = Role::where('nom', 'Modérateur')->first();

        if (!$roleAdmin) {
            return back()->withErrors(['role' => 'Le rôle modérateur est introuvable.']);
        }

        // 2️⃣ Créer l'utilisateur et assigner l'id_role
        $administrateur = new Utilisateur();
        $administrateur->nom = $validated['nom'];
        $administrateur->prenom = $validated['prenom'];
        $administrateur->email = $validated['email'];
        $administrateur->mot_de_passe = bcrypt($validated['mot_de_passe']);
        $administrateur->id_role = $roleAdmin->id; // lien automatique
        $administrateur->save();

        // 3️⃣ Rediriger avec message
        return redirect()->route('moderateur.index')
                        ->with('success', 'Modérateur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.moderateurs.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('moderateur.index')
                        ->with('success', 'Modérateur supprimé avec succès');
    }
}
