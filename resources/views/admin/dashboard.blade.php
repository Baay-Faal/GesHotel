@extends('layouts.guest')

@section('title', 'Administration - GesHotel')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">Tableau de bord Admin</h1>
            <p class="lead">Bienvenue, {{ Auth::user()->name }}</p>
            <a href="{{ route('home') }}" class="btn btn-outline-primary">← Retour au site</a>
        </div>
    </div>

    <!-- Stats rapides -->
    <div class="row mb-5">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body text-center">
                    <h2>{{ \App\Models\Reservations::count() }}</h2>
                    <p>Réservations totales</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body text-center">
                    <h2>{{ \App\Models\Reservations::where('statut', 'confirmée')->count() }}</h2>
                    <p>Confirmées</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body text-center">
                    <h2>{{ \App\Models\Reservations::where('statut', 'en attente')->count() }}</h2>
                    <p>En attente</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body text-center">
                    <h2>{{ \App\Models\User::where('role', 'client')->count() }}</h2>
                    <p>Clients inscrits</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Dernières réservations -->
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4>Dernières réservations</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Chambre</th>
                            <th>Arrivée</th>
                            <th>Départ</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Reservations::latest()->take(10)->get() as $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <td>{{ $res->user->name }}</td>
                                <td>{{ $res->chambre->nom ?? $res->chambre->type }}</td>
                                <td>{{ $res->date_arrivee->format('d/m/Y') }}</td>
                                <td>{{ $res->date_depart->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge badge-{{ $res->statut == 'confirmée' ? 'success' : 'warning' }}">
                                        {{ ucfirst($res->statut) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Voir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection