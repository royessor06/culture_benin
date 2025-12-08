<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langue;
use Yajra\DataTables\DataTables;

class LanguesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $langues = Langue::query()
            ->when($search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('langues.index', compact('langues'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('langues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Langue::create($request->all());
        return redirect()->route('langue.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.show', compact('langue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.edit', compact('langue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom'   =>  'required|string|',
            'code'  =>  'nullable|string',
        ]);

        $langue = Langue::findOrFail($id);

        $langue->update($validated);

        return redirect()->route('langue.index')
                         ->with('success', 'La langue a été mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $langue = Langue::findOrFail($id);
        $langue->delete();

        return redirect()->route('langue.index')
                        ->with('success', 'Langue supprimé avec succès');
    }
}
