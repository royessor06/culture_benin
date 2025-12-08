@extends('layouts.layout')

@section('title', 'Gestion des langues')
@section('page-title', 'Langues')
@section('page-subtitle', 'Gestion de toutes les langues')

@section('header-actions')
<div class="d-flex gap-2">
    <a href="{{ route('langue.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i>
        <span>Nouvelle langue</span>
    </a>
</div>
@endsection

@section('content')
<div class="card mb-4 shadow-sm animate-fade">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Liste des langues</h5>

        <div class="card-tools d-flex align-items-center">
            {{-- Barre de recherche --}}
            <form action="{{ route('langue.index') }}" method="GET" class="me-2">
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
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($langues as $langue)
                    <tr>
                        <td class="fw-semibold">{{ $langue->code }}</td>
                        <td>{{ $langue->nom }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('langue.show', $langue->id) }}"
                                    class="table-btn table-btn-view"
                                    title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('langue.edit', $langue->id) }}"
                                    class="table-btn table-btn-edit"
                                    title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('langue.destroy', $langue->id) }}"
                                    method="POST"
                                    class="inline-form"
                                    onsubmit="return confirm('Supprimer cette langue ?')">
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
                Affichage de {{ $langues->firstItem() }} à {{ $langues->lastItem() }}
                sur {{ $langues->total() }} résultats
        </div>
        <div class="card-footer">
                {{ $langues->links() }}
        </div>
    </div>
</div>
@endsection
