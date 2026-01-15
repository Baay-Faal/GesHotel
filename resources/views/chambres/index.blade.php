{{-- resources/views/chambres/index.blade.php --}}
@extends('layouts.guest')

@section('title', 'Nos Chambres - GesHotel')

@section('content')

<!-- Breadcrumb Section -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Nos Chambres</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Accueil</a>
                        <span>Chambres</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rooms Section -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            @forelse($chambres as $chambre)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="room-item">
                        <img src="{{ asset('storage/' . $chambre->image) }}" alt="{{ $chambre->type }}" class="img-fluid">
                        <div class="ri-text">
                            <h4>{{ $chambre->type }}</h4>
                            <h3>{{ number_format($chambre->prix) }} FCFA<span>/nuit</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Superficie:</td>
                                        <td>{{ $chambre->superficie }} m²</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacité:</td>
                                        <td>{{ $chambre->capacite }} personne{{ $chambre->capacite > 1 ? 's' : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Lit:</td>
                                        <td>{{ $chambre->type_lit }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, TV, Climatisation...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('chambres.show', $chambre) }}" class="primary-btn">
                                Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Aucune chambre disponible pour le moment.</p>
                </div>
            @endforelse
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="room-pagination">
                    {{ $chambres->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection