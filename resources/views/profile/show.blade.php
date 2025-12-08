@extends('layouts.layout')

@section('title', 'Mon Profil - Culture Bénin')
@section('page-title', 'Mon Profil')
@section('page-subtitle', 'Gérez vos informations personnelles')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="{{ asset('storage/' . auth()->user()->photo) ?? asset('adminLTE/img/roy_admin.jpg') }}"
                     alt="Photo de profil"
                     class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</h5>
                <p class="text-muted mb-1">{{ auth()->user()->email }}</p>
                <p class="text-muted mb-4">{{ auth()->user()->role->nom ?? 'Utilisateur' }}</p>
                <div class="d-flex justify-content-center mb-2">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                        <i class="fas fa-edit me-1"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Informations personnelles</h5>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nom complet</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Date d'inscription</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ auth()->user()->date_inscription }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Statut</p>
                    </div>
                    <div class="col-sm-9">
                        <span class="badge bg-success">{{ auth()->user()->statut }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
