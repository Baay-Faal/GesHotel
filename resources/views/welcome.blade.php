{{-- resources/views/welcome.blade.php --}}
@extends('layouts.guest')

@section('title', 'GesHotel - Hôtel 5 étoiles à Lomé')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Bienvenue au GesHotel</h1>
                    <p>Luxury, confort et hospitalité togolaise au cœur de Lomé. Découvrez une expérience hôtelière unique alliant élégance et modernité.</p>
                    <a href="{{ route('chambres.index') }}" class="primary-btn">Voir nos chambres</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3>Vérifier la disponibilité</h3>
                    <form action="{{ route('chambres.index') }}" method="GET">
                        <div class="check-date">
                            <label>Arrivée :</label>
                            <input type="text" name="arrivee" class="date-input" id="date-in" required>
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label>Départ :</label>
                            <input type="text" name="depart" class="date-input" id="date-out" required>
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label>Adultes :</label>
                            <select name="adultes">
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="select-option">
                            <label>Enfants :</label>
                            <select name="enfants">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <button type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider d'images -->
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="{{ asset('template/img/hero/hero-1.jpg') }}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('template/img/hero/hero-2.jpg') }}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('template/img/hero/hero-3.jpg') }}"></div>
    </div>
</section>

<!-- À propos rapide -->
<section class="aboutus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <span>Découvrez</span>
                        <h2>Un hôtel pas comme les autres</h2>
                    </div>
                    <p class="f-para">GesHotel est bien plus qu’un hôtel : c’est une expérience. Situé au cœur de Lomé, nous vous offrons le parfait équilibre entre luxe moderne et chaleur africaine.</p>
                    <p class="s-para">Piscine panoramique, spa, restaurant gastronomique, service 24h/24 — tout est pensé pour votre bien-être.</p>
                    <a href="{{ route('about') }}" class="primary-btn about-btn">En savoir plus</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-pic">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('template/img/about/about-1.jpg') }}" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('template/img/about/about-2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="services-section spad">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-title">
                <span>Nos services</span>
                <h2>Tout pour votre confort</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <i class="flaticon-036-parking"></i>
                    <h4>Parking gratuit</h4>
                    <p>Sécurisé et surveillé 24h/24</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <i class="flaticon-033-dinner"></i>
                    <h4>Restaurant</h4>
                    <p>Cuisine togolaise et internationale</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <i class="flaticon-026-bed"></i>
                    <h4>Chambres de luxe</h4>
                    <p>Literie haut de gamme, vue mer ou ville</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <i class="flaticon-024-towel"></i>
                    <h4>Spa & Bien-être</h4>
                    <p>Massages, sauna, hammam</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <i class="flaticon-044-clock-1"></i>
                    <h4>Service 24h/24</h4>
                    <p>Réception et room service</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <i class="flaticon-012-cocktail"></i>
                    <h4>Bar lounge</h4>
                    <p>Cocktails signature et musique live</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Chambres populaires -->
<section class="hp-room-section spad">
    <div class="container-fluid">
        <div class="text-center mb-5">
            <div class="section-title">
                <span>Les plus demandées</span>
                <h2>Nos meilleures chambres</h2>
            </div>
        </div>
        <div class="hp-room-items">
            <div class="row justify-content-center">
                @foreach(\App\Models\Chambre::inRandomOrder()->take(4)->get() as $chambre)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="hp-room-item set-bg" data-setbg="{{ asset('storage/' . $chambre->image) }}">
                            <div class="hr-text">
                                <h3>{{ $chambre->type }}</h3>
                                <h2>{{ number_format($chambre->prix) }} FCFA<span>/nuit</span></h2>
                                <table>
                                    <tbody>
                                        <tr><td class="r-o">Capacité</td><td>{{ $chambre->capacite }} pers.</td></tr>
                                        <tr><td class="r-o">Surface</td><td>{{ $chambre->superficie }} m²</td></tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('chambres.show', $chambre) }}" class="primary-btn">Voir détails</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    $(function() {
        // Datepicker
        $("#date-in, #date-out").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: 0
        });

        // Hero slider
        $(".hero-slider").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000,
            nav: false,
            dots: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn'
        });
    });
</script>
@endpush