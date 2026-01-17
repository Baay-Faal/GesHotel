@extends('layouts.guest')

@section('title', 'Gestion des chambres - Admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Gestion des chambres</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 text-right">
        <a href="{{ route('admin.chambres.create') }}" class="btn btn-primary">
            + Ajouter une chambre
        </a>
    </div>

    @if($chambres->isEmpty())
        <p>Aucune chambre pour le moment.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Numéro</th>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Prix (FCFA)</th>
                        <th>Disponible</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chambres as $chambre)
                        <tr>
                            <td>{{ $chambre->id }}</td>
                            <td>{{ $chambre->numero }}</td>
                            <td>{{ $chambre->nom }}</td>
                            <td>{{ $chambre->type }}</td>
                            <td>{{ number_format($chambre->prix, 0, ',', ' ') }}</td>
                            <td>
                                @if($chambre->disponible)
                                    <span class="badge badge-success">Oui</span>
                                @else
                                    <span class="badge badge-secondary">Non</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.chambres.edit', $chambre) }}" class="btn btn-sm btn-warning">
                                    Modifier
                                </a>
                                <form method="POST" action="{{ route('admin.chambres.destroy', $chambre) }}" class="d-inline"
                                      onsubmit="return confirm('Supprimer cette chambre ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection