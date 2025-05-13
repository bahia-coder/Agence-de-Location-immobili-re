@extends('layouts.admins')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="row">
    <!-- Propriétés -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-left-primary">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="fas fa-building"></i> Propriétés</h5>
                <p class="card-text">Nombre total : <strong>{{ $props_count }}</strong></p>
                <p class="card-text">Disponibles : <strong>{{ $props_count - 5 }}</strong></p>
                <p class="card-text">Vendues : <strong>5</strong></p>
            </div>
        </div>
    </div>

    <!-- Types de maisons -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-left-success">
            <div class="card-body">
                <h5 class="card-title text-success"><i class="fas fa-home"></i> Types de maisons</h5>
                <p class="card-text">Nombre total : <strong>{{ $home_types_count }}</strong></p>
                <p class="card-text">Populaires : <strong>Appartement, Villa</strong></p>
                <p class="card-text">Nouveaux types ajoutés : <strong>1</strong></p>
            </div>
        </div>
    </div>

    <!-- Administrateurs -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-left-danger">
            <div class="card-body">
                <h5 class="card-title text-danger"><i class="fas fa-user-shield"></i> Administrateurs</h5>
                <p class="card-text">Total : <strong>{{ $adminsCount }}</strong></p>
                <p class="card-text">Actifs : <strong>{{ $adminsCount - 1 }}</strong></p>
                <p class="card-text">Dernier ajouté : <strong>admin@example.com</strong></p>
            </div>
        </div>
    </div>

    <!-- Utilisateurs -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-left-warning">
            <div class="card-body">
                <h5 class="card-title text-warning"><i class="fas fa-users"></i> Utilisateurs</h5>
                <p class="card-text">Nombre total : <strong>{{ $usersCount }}</strong></p>
                <p class="card-text">Actifs : <strong>{{ $usersCount - 2 }}</strong></p>
                <p class="card-text">Nouveaux ce mois : <strong>4</strong></p>
            </div>
        </div>
    </div>
</div>

<!-- Section Statistique Supplémentaire -->
<div class="row mt-4">
    <div class="col-md-6 mb-4">
        <div class="card bg-light shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-chart-line"></i> Statistiques mensuelles</h5>
                <ul>
                    <li>Propriétés ajoutées ce mois : <strong>12</strong></li>
                    <li>Ventes conclues : <strong>7</strong></li>
                    <li>Utilisateurs enregistrés : <strong>25</strong></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card bg-light shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-bell"></i> Dernières activités</h5>
                <ul>
                    <li>🏠 Nouvelle propriété ajoutée à Casablanca</li>
                    <li>👤 Nouvel admin inscrit : admin2@example.com</li>
                    <li>🏡 Type "Riad" ajouté aux types de maison</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
