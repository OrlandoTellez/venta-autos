<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;


class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::latest()->paginate(15);

        return view('pages.clientes.index', [
            'users' => $clientes,
            'colors' => true,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'direccion' => ['required', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:100'],
            'telefono' => ['required', 'string', 'max:20'],
        ]);

        $cliente = Cliente::create($validated);

        return response()->json([
            'message' => 'Cliente registrado con éxito',
            'cliente' => $cliente
        ], 201);
    }

    public function destroy(Cliente $cliente)   // type‑hint ⇒ encuentra por id
    {
        $cliente->delete();
        return back()->with('success', 'Cliente eliminado');
    }
}