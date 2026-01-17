<?php


namespace App\Http\Controllers\Admin;
use App\Models\Chambre;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
     public function index()
    {
        $chambres = Chambre::orderBy('numero')->get();

        return view('admin.chambres.index', compact('chambres'));
    }

    // Formulaire de création
    public function create()
    {
        return view('admin.chambres.create');
    }

    // Enregistrement d'une nouvelle chambre
    public function store(Request $request)
    {
        $request->validate([
            'numero'      => 'required|string|max:10|unique:chambres,numero',
            'nom'         => 'required|string|max:255',
            'type'        => 'required|string|max:100',
            'prix'        => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'disponible'  => 'nullable|boolean',
        ]);

        Chambre::create([
            'numero'      => $request->numero,
            'nom'         => $request->nom,
            'type'        => $request->type,
            'prix'        => $request->prix,
            'description' => $request->description,
            'disponible'  => $request->boolean('disponible'),
        ]);

        return redirect()->route('admin.chambres.index')
            ->with('success', 'Chambre créée avec succès.');
    }

    // Formulaire d'édition
    public function edit(Chambre $chambre)
    {
        return view('admin.chambres.edit', compact('chambre'));
    }

    // Mise à jour
    public function update(Request $request, Chambre $chambre)
    {
        $request->validate([
            'numero'      => 'required|string|max:10|unique:chambres,numero,' . $chambre->id,
            'nom'         => 'required|string|max:255',
            'type'        => 'required|string|max:100',
            'prix'        => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'disponible'  => 'nullable|boolean',
        ]);

        $chambre->update([
            'numero'      => $request->numero,
            'nom'         => $request->nom,
            'type'        => $request->type,
            'prix'        => $request->prix,
            'description' => $request->description,
            'disponible'  => $request->boolean('disponible'),
        ]);

        return redirect()->route('admin.chambres.index')
            ->with('success', 'Chambre mise à jour.');
    }

    // Suppression
    public function destroy(Chambre $chambre)
    {
        $chambre->delete();

        return redirect()->route('admin.chambres.index')
            ->with('success', 'Chambre supprimée.');
    }
}
