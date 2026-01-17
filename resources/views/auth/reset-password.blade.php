@extends('layouts.guest')

@section('title', 'Réinitialiser le mot de passe - GesHotel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0" style="border-radius: 20px;">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3>Nouveau mot de passe</h3>
                </div>
                <div class="card-body p-5">

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required>
                            @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required>
                            @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Confirmer</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block w-100">
                            Réinitialiser le mot de passe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection