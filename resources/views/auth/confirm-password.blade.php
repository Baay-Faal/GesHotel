@extends('layouts.guest')

@section('title', 'Confirmer le mot de passe - GesHotel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0" style="border-radius: 20px;">
                <div class="card-header bg-warning text-dark text-center py-4">
                    <h3>Sécurité</h3>
                    <p class="mb-0">Confirmez votre mot de passe pour continuer</p>
                </div>
                <div class="card-body p-5">

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="form-control form-control-lg" required autofocus>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block w-100">
                            Confirmer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection