@extends('layouts.layout')

@section('title', 'Ajouter Contenu')


@section('content')
<div class="form-container">
    <h2>Ajouter un contenu</h2>

    <form action="{{ route('contenu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Titre</label>
        <input type="text" name="titre" required>

        <label>Texte</label>
        <textarea name="texte" rows="5" required></textarea>

        <label>Type de Contenu</label>
        <select name="type_contenu_id" required>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->nom }}</option>
            @endforeach
        </select>

        <label>Région</label>
        <select name="region_id" required>
            @foreach($regions as $region)
                <option value="{{ $region->id }}">{{ $region->nom }}</option>
            @endforeach
        </select>

        <label>Langue</label>
        <select name="langue_id" required>
            @foreach($langues as $langue)
                <option value="{{ $langue->id }}">{{ $langue->nom }}</option>
            @endforeach
        </select>

        <label>Images / Médias</label>
        <input type="file" name="medias[]" multiple>

        <button type="submit" class="submit-btn">Ajouter</button>
    </form>
</div>

<style>
.form-container {
    width: 55%;
    margin: 40px auto;
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
}
form input, form textarea, form select {
    width: 100%;
    margin-top: 8px;
    margin-bottom: 20px;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ddd;
}
.submit-btn {
    padding: 12px 20px;
    background: #e8b600;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}
.submit-btn:hover {
    background: #ffcf33;
}
</style>
@endsection
