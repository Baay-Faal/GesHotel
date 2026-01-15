{{-- resources/views/about.blade.php --}}
@extends('layouts.guest')

@section('title', 'À propos - GesHotel')

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>À propos de nous</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Accueil</a>
                        <span>À propos</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Us Page Section -->
<section class="aboutus-page-section spad">
    <div class="container">
        <div class="about-page-text">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ap-title">
                        <h2>Bienvenue chez GesHotel</h2>
                        <p>Depuis 2020, GesHotel est le symbole du luxe et du confort à Lomé. Nous combinons une architecture moderne avec une hospitalité togolaise authentique pour vous offrir une expérience inoubliable.</p>
                        <p>Notre équipe de plus de 50 professionnels est dédiée à rendre votre séjour parfait, que vous veniez pour affaires ou pour le plaisir.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <ul class="ap-services">
                        <li><i class="icon_check"></i> 20% de réduction sur les longs séjours</li>
                        <li><i class="icon_check"></i> Petit-déjeuner gratuit</li>
                        <li><i class="icon_check"></i> WiFi haut débit gratuit</li>
                        <li><i class="icon_check"></i> Service de blanchisserie inclus</li>
                        <li><i class="icon_check"></i> Navette aéroport gratuite</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="about-page-services">
            <div class="row">
                <div class="col-md-4">
                    <div class="ap-service-item set-bg" data-setbg="{{ asset('template/img/about/about-p1.jpg') }}">
                        <div class="api-text">
                            <h3>Restaurant Gastronomique</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ap-service-item set-bg" data-setbg="{{ asset('template/img/about/about-p2.jpg') }}">
                        <div class="api-text">
                            <h3>Spa & Bien-être</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ap-service-item set-bg" data-setbg="{{ asset('template/img/about/about-p3.jpg') }}">
                        <div class="api-text">
                            <h3>Événements & Mariages</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Section -->
<section class="video-section set-bg" data-setbg="{{ asset('template/img/video-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-text">
                    <h2>Découvrez GesHotel en vidéo</h2>
                    <p>Une expérience unique au cœur de Lomé</p>
                    <a href="https://www.youtube.com/watch?v=TU_VIDEO_ID" class="play-btn video-popup">
                        <img src="{{ asset('template/img/play.png') }}" alt="Play">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="gallery-section spad">
    <div class="container">
        <div class="section-title text-center">
            <span>Notre galerie</span>
            <h2>Découvrez nos espaces</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="gallery-item set-bg" data-setbg="{{ asset('template/img/gallery/gallery-1.jpg') }}">
                    <div class="gi-text"><h3>Chambre de luxe</h3></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="gallery-item set-bg" data-setbg="{{ asset('template/img/gallery/gallery-3.jpg') }}">
                            <div class="gi-text"><h3>Piscine</h3></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="gallery-item set-bg" data-setbg="{{ asset('template/img/gallery/gallery-4.jpg') }}">
                            <div class="gi-text"><h3>Restaurant</h3></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="gallery-item large-item set-bg" data-setbg="{{ asset('template/img/gallery/gallery-2.jpg') }}">
                    <div class="gi-text"><h3>Spa & Wellness</h3></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Popup vidéo
    $('.video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
    });
</script>
@endpush