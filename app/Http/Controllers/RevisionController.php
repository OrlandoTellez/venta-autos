<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Coche;
use App\Models\Cliente;
use App\Models\Revision;
use Illuminate\Http\Request;

class RevisionController extends Controller
{
     public function index()
    {
        $revisiones = Revision::with('coche')  
                              ->latest('fecha')
                              ->paginate(15);

        $coches = Coche::orderBy('modelo')->get();

        return view('pages.revisiones.index', [
            'revisiones' => $revisiones,
            'coches'     => $coches,
            'colors'     => true,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'coche_id'       => ['required', 'exists:coches,id'],
            'cambio_filtro'  => ['sometimes', 'accepted'],
            'cambio_aceite'  => ['sometimes', 'accepted'],
            'cambio_frenos'  => ['sometimes', 'accepted'],
            'otros'          => ['nullable', 'string', 'max:255'],
            'fecha'          => ['required', 'date'],
            'costo'          => ['required', 'numeric', 'min:0'],
        ]);

        $data = array_merge([
            'cambio_filtro' => 0,
            'cambio_aceite' => 0,
            'cambio_frenos' => 0,
        ], $data);

        $revision = Revision::create($data)->load('coche');

        return response()->json([
            'message'  => 'Revisión registrada con éxito',
            'revision' => $revision,
        ]);
    }
    public function destroy(Revision $revision)
    {
        $revision->delete();
        return back()->with('success', 'Revisión eliminada');
    }
}
