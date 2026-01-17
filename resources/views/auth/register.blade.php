@extends('layouts.guest')

@section('title', 'Inscription - GesHotel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-9 col-lg-7">
            <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header text-center bg-primary text-white py-4">
                    <h3 class="mb-0">Créer votre compte GesHotel</h3>
                    <small>Rejoignez-nous et réservez en quelques clics</small>
                </div>
                <div class="card-body p-5">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Nom complet</label>
                                <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" required autofocus placeholder="Jean Dupont">
                                @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Téléphone</label>
                                <input type="text" name="phone" class="form-control form-control-lg"
                                       value="{{ old('phone') }}" placeholder="+228 90 00 00 00">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required placeholder="jean@exemple.com">
                            @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Mot de passe</label>
                                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                       required placeholder="••••••••">
                                @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="font-weight-bold">Confirmer</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-lg" required placeholder="••••••••">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block w-100">
                            Créer mon compte
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">
                            Déjà inscrit ?
                            <a href="{{ route('login') }}" class="font-weight-bold text-primary">
                                Se connecter
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection