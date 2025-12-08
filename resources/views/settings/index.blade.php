@extends('layouts.layout')

@section('title', 'Paramètres - Culture Bénin')
@section('page-title', 'Paramètres')
@section('page-subtitle', 'Gérez vos préférences et sécurité')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Changer le mot de passe</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Mot de passe actuel</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Mettre à jour
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Préférences</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Thème</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="theme" id="lightTheme" checked>
                        <label class="form-check-label" for="lightTheme">
                            <i class="fas fa-sun me-1"></i> Clair
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="theme" id="darkTheme">
                        <label class="form-check-label" for="darkTheme">
                            <i class="fas fa-moon me-1"></i> Sombre
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Langue</label>
                    <select class="form-select">
                        <option>Français</option>
                        <option>English</option>
                    </select>
                </div>

                <button type="button" class="btn btn-secondary">
                    <i class="fas fa-sync-alt me-1"></i> Enregistrer les préférences
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
