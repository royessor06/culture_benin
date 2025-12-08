@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>Nom :</strong> {{ $region->nom }}</p>
        <p><strong>Description :</strong> {{ $region->description }}</p>
        <p><strong>Population :</strong> {{ $region->population }}</p>
        <p><strong>Superficie :</strong> {{ $region->superficie }}</p>
        <p><strong>Localisation :</strong> {{ $region->localisation }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('region.index') }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('region.edit', $region->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('region.destroy', $region->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
@endsection
