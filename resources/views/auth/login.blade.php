@extends('layouts.guest')

@section('title', 'Connexion - GesHotel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header text-center bg-primary text-white py-4">
                    <h3 class="mb-0">Connexion à votre compte</h3>
                    <small>Bienvenue chez GesHotel Lomé</small>
                </div>
                <div class="card-body p-5">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Adresse email</label>
                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required autofocus placeholder="email@exemple.com">
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Mot de passe</label>
                            <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   required autocomplete="current-password" placeholder="••••••••">
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                <label class="custom-control-label" for="remember">Rester connecté</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary">
                                    Mot de passe oublié ?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block w-100">
                            Se connecter
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">
                            Pas encore de compte ?
                            <a href="{{ route('register') }}" class="font-weight-bold text-primary">
                                S'inscrire gratuitement
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection