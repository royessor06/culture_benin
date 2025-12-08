@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Information</h3>
    </div>
    <div class="card-body">
        <p><strong>Nom :</strong> {{ $utilisateur->nom }}</p>
        <p><strong>Prénom(s) :</strong> {{ $utilisateur->prenom }}</p>
        <p><strong>Email :</strong> {{ $utilisateur->email }}</p>
        <p><strong>Date de naissance :</strong> {{ $utilisateur->date_naissance }}</p>
        <p><strong>Statut :</strong> {{ $utilisateur->statut }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('moderateur.index') }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('moderateur.edit', $utilisateur->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('moderateur.destroy', $utilisateur->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
@endsection
