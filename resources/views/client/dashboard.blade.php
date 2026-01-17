{{-- resources/views/client/dashboard.blade.php --}}
@extends('layouts.guest')

@section('title', 'Mon espace - GesHotel')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5">
                <h1 class="display-5">Bonjour, {{ Auth::user()->name }} !</h1>
                <p class="lead">Votre espace client</p>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5>Mes informations</h5>
                </div>
                <div class="card-body">
                    <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Membre depuis :</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Modifier mon profil</a>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white d-flex justify-content-between">
                    <h5>Mes réservations</h5>
                    <a href="{{ route('chambres.index') }}" class="btn btn-light btn-sm">Nouvelle réservation</a>
                </div>
                <div class="card-body">
                    @php $reservations = Auth::user()->reservations; @endphp

                    @if($reservations->count() == 0)
                        <p class="text-center text-muted my-4">Aucune réservation pour le moment.</p>
                        <div class="text-center">
                            <a href="{{ route('chambres.index') }}" class="btn btn-primary">Découvrir nos chambres</a>
                        </div>
                    @else
                        <div class="row">
                            @foreach($reservations as $res)
                                <div class="col-md-6 mb-3">
                                    <div class="card border-primary">
                                        <div class="card-body">
                                            <h6>{{ $res->chambre->nom ?? 'Chambre' }}</h6>
                                            <p class="mb-1">{{ $res->date_arrivee->format('d/m') }} → {{ $res->date_depart->format('d/m/Y') }}</p>
                                            <span class="badge badge-{{ $res->statut == 'confirmée' ? 'success' : 'warning' }}">
                                                {{ ucfirst($res->statut) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection