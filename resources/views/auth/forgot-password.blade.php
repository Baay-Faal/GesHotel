@extends('layouts.guest')

@section('title', 'Mot de passe oublié - GesHotel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0" style="border-radius: 20px;">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3>Mot de passe oublié ?</h3>
                    <p class="mb-0">Pas de souci, on vous envoie un lien de réinitialisation</p>
                </div>
                <div class="card-body p-5">

                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label>Adresse email</label>
                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required autofocus placeholder="votre@email.com">
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block w-100">
                            Envoyer le lien de réinitialisation
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{ route('login') }}" class="text-muted">← Retour à la connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection