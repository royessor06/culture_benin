@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>Code :</strong> {{ $langue->code }}</p>
        <p><strong>Langue :</strong> {{ $langue->nom }}</p>
        <p><strong>Description :</strong> {{ $langue->description }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('langue.index') }}" class="btn btn-secondary">Retour</a>

        <a href="{{ route('langue.edit', $langue->id) }}" class="btn btn-warning">Modifier</a>
    
        <form action="{{ route('langue.destroy', $langue->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
@endsection
