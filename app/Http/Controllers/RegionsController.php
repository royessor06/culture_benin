<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $regions = Region::query()
            ->when($search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Region::create($request->all());
        return redirect()->route('region.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $region = Region::all()->findOrFail($id);
        return view('regions.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $region = Region::findOrFail($id);
        return view('regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'nullable|string',
            'population'  => 'required|numeric',
            'superficie'  => 'required|numeric',
            'localisation'=> 'required|string|max:255',
        ]);

        $region = Region::findOrFail($id);

        $region->update($validated);

        return redirect()->route('region.index')
                         ->with('success', 'La région a été mise à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

        return redirect()->route('region.index')
                        ->with('success', 'Région supprimé avec succès');
    }
}
