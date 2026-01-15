{{-- resources/views/contact.blade.php --}}
@extends('layouts.guest')

@section('title', 'Contact - GesHotel')

@section('content')

<!-- Breadcrumb Section -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Contactez-nous</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Accueil</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Nos coordonnées</h2>
                    <p>Nous sommes disponibles 24h/24 pour répondre à vos demandes.</p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Adresse :</td>
                                <td>Avenue des Palmiers, Quartier Administratif<br>Lomé, Togo</td>
                            </tr>
                            <tr>
                                <td class="c-o">Téléphone :</td>
                                <td>(+228) 22 21 50 00</td>
                            </tr>
                            <tr>
                                <td class="c-o">WhatsApp :</td>
                                <td>(+228) 91 11 11 11</td>
                            </tr>
                            <tr>
                                <td class="c-o">Email :</td>
                                <td>contact@geshotel.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-7 offset-lg-1">
                <!-- Message de succès -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fa fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <input 
                                type="text" 
                                name="name" 
                                placeholder="Votre nom complet"
                                value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}"
                                required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <input 
                                type="email" 
                                name="email" 
                                placeholder="Votre adresse email"
                                value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                                required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <input 
                                type="text" 
                                name="subject" 
                                placeholder="Sujet (facultatif)"
                                value="{{ old('subject') }}">
                        </div>
                        <div class="col-lg-12">
                            <textarea 
                                name="message" 
                                placeholder="Votre message..." 
                                rows="6"
                                required>{{ old('message') }}</textarea>
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="primary-btn w-100">
                                Envoyer le message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="map mt-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.557919271285!2d1.219486614763!3d6.172498995528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10235a2f6f9b0b0b%3A0x9c9c9c9c9c9c9c9c!2sLom%C3%A9%2C%20Togo!5e0!3m2!1sfr!2sfr!4v1700000000000"
                height="450"
                style="border:0; width:100%;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </div>
</section>

@endsection