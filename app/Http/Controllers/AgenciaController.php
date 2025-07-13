<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agencia;
use Illuminate\Http\Request;

class AgenciaController extends Controller
{
     public function index()
    {
        $agencias = Agencia::latest()->paginate(15);

        return view('pages.agencias.index', [
            'agencias' => $agencias,
            'colors' => true,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'rfc' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:100'],
            'telefono' => ['required', 'string', 'max:20'],
        ]);

        $agencia = Agencia::create($validated);

        return response()->json([
            'message' => 'Agencia registrada con éxito',
            'agencia' => $agencia
        ], 201);
    }

    public function destroy(Agencia $agencia)   // type‑hint ⇒ encuentra por id
    {
        $agencia->delete();
        return back()->with('success', 'Cliente eliminado');
    }
}
