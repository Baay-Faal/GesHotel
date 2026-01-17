@extends('layouts.guest')

@section('title', 'Vérification email - GesHotel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 text-center" style="border-radius: 20px;">
                <div class="card-body p-5">
                    <i class="fa fa-envelope fa-4x text-primary mb-4"></i>
                    <h3>Vérifiez votre adresse email</h3>
                    <p class="mb-4">
                        Un lien de vérification a été envoyé à votre adresse email.
                    </p>

                    @if (session('resent'))
                        <div class="alert alert-success">
                            Un nouveau lien vient de vous être envoyé !
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">
                            Renvoyer le lien de vérification
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="d-inline ml-3">
                        @csrf
                        <button type="submit" class="btn btn-link text-muted">
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection