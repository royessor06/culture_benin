<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class ContributeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $contributeurs = Utilisateur::query()
            ->when($search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('prenom', 'like', "%{$search}%");
            })
            ->paginate(10);

        $utilisateurs = Utilisateur::whereHas('role', function ($query) {
            $query->where('nom', 'Contributeur');
        })->get();

        return view('utilisateurs.contributeurs.index', compact('utilisateurs','contributeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.contributeurs.show', compact('utilisateur'));
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

        return redirect()->route('utilisateur.administrateur.index')
                        ->with('success', 'Contributeur supprimé avec succès');
    }
}
