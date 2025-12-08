<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class LecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $lecteurs = Utilisateur::query()
            ->when($search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('prenom', 'like', "%{$search}%");
            })
            ->paginate(10);

        $utilisateurs = Utilisateur::whereHas('role', function ($query) {
            $query->where('nom', 'Lecteur');
        })->get();

        return view('utilisateurs.lecteurs.index', compact('utilisateurs','lecteurs'));
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
        return view('utilisateurs.lecteurs.show', compact('utilisateur'));
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

        return redirect()->route('lecteur.index')
                        ->with('success', 'Lecteur supprimé avec succès');
    }
}
