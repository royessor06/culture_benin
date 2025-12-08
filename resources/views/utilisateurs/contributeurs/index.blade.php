@extends('layouts.layout')

@section('title', 'Gestion des contributeurs')
@section('page-title', 'Contributeurs')
@section('page-subtitle', 'Gestion de tous les contributeurs')

@section('header-actions')
<div class="d-flex gap-2">
</div>
@endsection

@section('content')
    <div class="table-container card mb-4">
        <div class="table-header-actions d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0 fw-bold">Liste des contributeurs</h5>

            <div class="d-flex gap-2 align-items-center">
                {{-- Barre de recherche --}}
                <form action="{{ route('contributeur.index') }}" method="GET" class="me-2">
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
                        <th>Prénoms</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($utilisateurs as $utilisateur)
                        <tr>
                            <td class="fw-semibold">{{ $utilisateur->nom }}</td>
                            <td>{{ $utilisateur->prenom }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-envelope text-primary"></i>
                                    <span class="truncate-text" data-full-text="{{ $utilisateur->email }}">
                                        {{ $utilisateur->email }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $utilisateur->date_inscription }}
                                </span>
                            </td>
                            <td>
                                @if($utilisateur->statut === 'actif')
                                <span class="table-badge published">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Actif
                                </span>
                                @elseif($utilisateur->statut === 'inactif')
                                <span class="table-badge draft">
                                    <i class="fas fa-pause-circle me-1"></i>
                                    Inactif
                                </span>
                                @else
                                <span class="table-badge pending">
                                    <i class="fas fa-clock me-1"></i>
                                    En attente
                                </span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('contributeur.show', $utilisateur->id) }}"
                                        class="table-btn table-btn-view"
                                        title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('contributeur.destroy', $utilisateur->id) }}"
                                        method="POST"
                                        class="inline-form"
                                        onsubmit="return confirm('Supprimer ce contributeurs ?')">
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
                Affichage de {{ $contributeurs->firstItem() }} à {{ $contributeurs->lastItem() }}
                sur {{ $contributeurs->total() }} résultats
            </div>
            <div class="card-footer">
                {{ $contributeurs->links() }}
            </div>
        </div>
    </div>
@endsection
