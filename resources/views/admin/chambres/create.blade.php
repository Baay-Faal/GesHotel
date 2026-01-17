@extends('layouts.guest')

@section('title', 'Ajouter une chambre - Admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Ajouter une chambre</h2>

    <form method="POST" action="{{ route('admin.chambres.store') }}">
        @csrf

        <div class="form-group">
            <label>Numéro</label>
            <input type="text" name="numero" class="form-control" value="{{ old('numero') }}" required>
            @error('numero')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label>Nom de la chambre</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
            @error('nom')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label>Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type') }}" placeholder="Standard, Deluxe, Suite..." required>
            @error('type')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label>Prix par nuit (FCFA)</label>
            <input type="number" name="prix" class="form-control" value="{{ old('prix') }}" required min="0">
            @error('prix')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="disponible" class="form-check-input" id="disponible" checked>
            <label class="form-check-label" for="disponible">Disponible</label>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.chambres.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection