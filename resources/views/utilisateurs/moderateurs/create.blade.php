@extends('layouts.layout')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Ajouter un modérateurs</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('moderateur.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénoms</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('moderateur.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
