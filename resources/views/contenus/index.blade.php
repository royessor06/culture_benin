@extends('layouts.layout')

@section('title', 'Gestion des contenus')
@section('page-title', 'Contenus')
@section('page-subtitle', 'Gestion de tous les contenus')

@section('header-actions')
<div class="d-flex gap-2">
    <a href="{{ route('contenu.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i>
        <span>Nouveau contenu</span>
    </a>
</div>
@endsection

@section('content')
<div class="card mb-4 shadow-sm animate-fade">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Liste des contenus</h5>

        <div class="card-tools d-flex align-items-center">
            {{-- Barre de recherche --}}
            <form action="{{ route('contenu.index') }}" method="GET" class="me-2">
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
                        <th>Titre</th>
                        <th>Texte</th>
                        <th>Statut</th>
                        <th>Auteur</th>
                        <th>Modérateur</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($contenus as $contenu)
                        <tr>
                            <td class="fw-semibold">{{ $contenu->titre }}</td>
                            <td>{{ Str::limit($contenu->texte, 60) }}</td>

                            <td>
                                <span class="badge
                                    {{
                                        $contenu->statut === 'Publié' ? 'bg-success' :
                                        ($contenu->statut === 'Brouillon' ? 'bg-warning' : 'bg-danger')
                                    }}">
                                    {{ $contenu->statut }}
                                </span>
                            </td>

                            <td>{{ $contenu->auteur->nom }} {{ $contenu->auteur->prenom }}</td>
                            <td>{{ $contenu->moderateur->nom ?? '—' }} {{ $contenu->moderateur->prenom ?? '' }}</td>

                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('contenu.show', $contenu->id) }}"
                                        class="table-btn table-btn-view"
                                        title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('contenu.destroy', $contenu->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Supprimer ce contenu ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="table-btn table-btn-delete">
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
                Affichage de {{ $contenus->firstItem() }} à {{ $contenus->lastItem() }}
                sur {{ $contenus->total() }} résultats
        </div>
        <div class="card-footer">
                {{ $contenus->links() }}
        </div>
    </div>
</div>
@endsection
