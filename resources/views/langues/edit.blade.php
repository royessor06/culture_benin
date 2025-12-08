@extends('layouts.layout')

@section('content')
    <div class="card card-warning card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Modifier une langue</div>
        </div>
        <form method="POST" action="{{ route('langue.update', $langue->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row mb-3">
                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               id="nom"
                               name="nom"
                               value="{{ old('nom', $langue->nom) }}"
                               required/>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="code" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               id="code"
                               name="code"
                               value="{{ old('code', $langue->code) }}"
                               required/>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control"
                                  id="description"
                                  name="description"
                                  rows="3">{{ old('description', $langue->description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="button"
                        class="btn btn-danger"
                        onclick="window.location='{{ route('langue.index') }}'">
                    Annuler
                </button>

                <button type="submit" class="btn float-end btn-success">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
@endsection
