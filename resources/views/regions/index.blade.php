@extends('layouts.layout')

@section('title', 'Gestion des régions')
@section('page-title', 'Régions')
@section('page-subtitle', 'Gestion de toutes les régions')

@section('header-actions')
<div class="d-flex gap-2">
    <a href="{{ route('region.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span>Nouvelle région</span>
    </a>
</div>
@endsection

@section('content')
    <div class="card mb-4 shadow-sm animate-fade">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Liste des régions</h5>

            <div class="card-tools d-flex align-items-center">
                {{-- Barre de recherche --}}
                <form action="{{ route('region.index') }}" method="GET" class="me-2">
                    <div class="input-group input-group-sm">
                        <input type="text" name="search" class="form-control" placeholder="Rechercher..."
                               value="{{ request('search') }}">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive card-body p-0">
            <table class="data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Localisation</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($regions as $region)
                        <tr>
                            <td class="fw-semibold">{{ $region->nom }}</td>
                            <td>{{ $region->localisation }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('region.show', $region->id) }}"
                                        class="table-btn table-btn-view"
                                        title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('region.edit', $region->id) }}"
                                        class="table-btn table-btn-edit"
                                        title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('region.destroy', $region->id) }}"
                                        method="POST"
                                        class="inline-form"
                                        onsubmit="return confirm('Supprimer cette région ?')">
                                        @csrf
                                        @method('DELETE')
                                       <button type="submit" class="table-btn table-btn-delete" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-pagination">
            <div class="pagination-info">
                    Affichage de {{ $regions->firstItem() }} à {{ $regions->lastItem() }}
                    sur {{ $regions->total() }} résultats
            </div>
            <div class="card-footer">
                {{ $regions->links() }}
            </div>
        </div>
    </div>
@endsection
