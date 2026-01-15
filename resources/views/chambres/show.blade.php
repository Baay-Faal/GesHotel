{{-- resources/views/chambres/show.blade.php --}}
@extends('layouts.guest')

@section('title', $chambre->type . ' - GesHotel')

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>{{ $chambre->type }}</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Accueil</a>
                        <a href="{{ route('chambres.index') }}">Chambres</a>
                        <span>{{ $chambre->type }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Room Details Section -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <img src="{{ asset('storage/' . $chambre->image) }}" alt="{{ $chambre->type }}" class="img-fluid">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>{{ $chambre->type }}</h3>
                            <div class="rdt-right">
                                <div class="rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="icon_star{{ $i <= 4.5 ? '' : '-half_alt' }}"></i>
                                    @endfor
                                </div>
                                <a href="#booking" class="scroll-to">Réserver</a>
                            </div>
                        </div>
                        <h2>{{ number_format($chambre->prix) }} FCFA<span>/nuit</span></h2>
                        <table>
                            <tbody>
                                <tr><td class="r-o">Superficie:</td><td>{{ $chambre->superficie }} m²</td></tr>
                                <tr><td class="r-o">Capacité:</td><td>{{ $chambre->capacite }} personne{{ $chambre->capacite > 1 ? 's' : '' }}</td></tr>
                                <tr><td class="r-o">Lit:</td><td>{{ $chambre->type_lit }}</td></tr>
                                <tr><td class="r-o">Vue:</td><td>{{ $chambre->vue ?? 'Standard' }}</td></tr>
                            </tbody>
                        </table>
                        <p>{!! nl2br(e($chambre->description)) !!}</p>
                    </div>
                </div>

                <!-- Galerie photos supplémentaires (optionnel) -->
                @if($chambre->galerie)
                <div class="row mt-5">
                    @foreach(json_decode($chambre->galerie) as $photo)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('storage/' . $photo) }}" class="img-fluid rounded" alt="Photo chambre">
                        </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Formulaire de réservation -->
            <div class="col-lg-4">
                <div class="room-booking" id="booking">
                    <h3>Réserver cette chambre</h3>
                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">

                        <div class="check-date">
                            <label>Arrivée :</label>
                            <input type="text" name="date_arrivee" class="date-input" required>
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label>Départ :</label>
                            <input type="text" name="date_depart" class="date-input" required>
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label>Adultes :</label>
                            <select name="adultes" required>
                                @for($i = 1; $i <= $chambre->capacite; $i++)
                                    <option value="{{ $i }}">{{ $i }} Adulte{{ $i > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="select-option">
                            <label>Enfants :</label>
                            <select name="enfants">
                                <option value="0">0</option>
                                @for($i = 1; $i <= 2; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <button type="submit" class="primary-btn w-100 mt-3">
                            Vérifier la disponibilité
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    $(function() {
        $(".date-input").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: 0,
            numberOfMonths: 1
        });
    });
</script>
@endpush