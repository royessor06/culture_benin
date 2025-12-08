<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use Illuminate\Http\Request;
use App\Models\TypeContenu;
use App\Models\Region;
use App\Models\Langue;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;

class ContenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $contenus = Contenu::query()
            ->when($search, function ($query, $search) {
                $query->where('titre', 'like', "%{$search}%")
                    ->orWhere('texte', 'like', "%{$search}%");
            })
            ->paginate(10);


        return view('contenus.index', compact('contenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = TypeContenu::all();
    $regions = Region::all();
    $langues = Langue::all();

    return view('contenus.create', compact('types', 'regions', 'langues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'titre' => 'required',
        'texte' => 'required',
        'region_id' => 'required|exists:regions,id',
        'langue_id' => 'required|exists:langues,id',
        'type_contenu_id' => 'required|exists:type_contenus,id',
    ]);
    $contenu = Contenu::create([
        'titre' => $request->titre,
        'texte' => $request->texte,
        'region_id' => $request->region_id,
        'langue_id' => $request->langue_id,
        'type_contenu_id' => $request->type_contenu_id,
        'auteur_id' => Auth::id(),
        'statut' => 'en_attente',        // valide après modération
        'moderateur_id' => null,
        'parent_id' => null,
        'date_validation' => null
    ]);

    if ($request->hasFile('medias')) {
        foreach($request->file('medias') as $media) {
            $path = $media->store('medias', 'public');

            Media::create([
                'chemin' => $path,
                'contenu_id' => $contenu->id
            ]);
        }
    }

    return redirect()->route('contenus.type', ['nom' => $contenu->typeContenu->nom])
                     ->with('success', 'Contenu ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contenu = Contenu::with([
            'auteur',
            'moderateur',
            'commentaires.auteur'
        ])->findOrFail($id);

    return view('contenus.show', compact('contenu'));
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
        $contenu = Contenu::findOrFail($id);
        $contenu->delete();

        return redirect()->route('contenu.index')
                        ->with('success', 'Contenu supprimé avec succès');
    }
}
