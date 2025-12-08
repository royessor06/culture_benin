@extends('layouts.layout')

@section('title', 'Détails du Contenu')


@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $contenu->titre }}</h3>
    </div>
    <div class="card-body">
        <p><strong>Texte :</strong> {{ $contenu->texte }}</p>
        <p><strong>Statut :</strong> {{ $contenu->statut }}</p>
        <p><strong>Auteur :</strong> {{ $contenu->auteur->nom }} {{ $contenu->auteur->prenom }}</p>
        <p><strong>Modérateur :</strong> {{ $contenu->moderateur->nom ?? 'N/A'}} {{ $contenu->moderateur->prenom ?? ''}}</p>
    </div>
    <div class="card-body">
        <h4>Commentaires</h4>
        @if($contenu->commentaires->isEmpty())
            <p>Aucun commentaire pour ce contenu.</p>
        @else
            <ul class="list-group">
                @foreach($contenu->commentaires as $commentaire)
                    <li class="list-group-item">
                        <strong>{{ $commentaire->utilisateur->nom }} {{ $commentaire->utilisateur->prenom }} :</strong>
                        {{ $commentaire->texte }}
                        <br>
                        <small class="text-muted">Posté le {{ $commentaire->created_at->format('d/m/Y H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="card-footer">
        <a href="{{ route('contenu.index') }}" class="btn btn-secondary">Retour</a>
        <form action="{{ route('contenu.destroy', $contenu->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
@endsection
