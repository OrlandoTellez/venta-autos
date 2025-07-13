<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Cliente;
use App\Models\Coche;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with(['cliente', 'coche'])->latest('created_at')->paginate(15);
        $clientes = Cliente::orderBy('nombre')->get();
        $coches = Coche::orderBy('modelo')->get();
        return view('pages.compras.index', [
            'compras' => $compras,
            'clientes' => $clientes,
            'coches' => $coches,
            'colors' => true,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => ['required', 'exists:clientes,id'],
            'coche_id' => ['required', 'exists:coches,id'],
            'fecha' => ['required', 'date'],
        ]);

        $compra = Compra::create($data);

        return response()->json([
            'message' => 'Compra registrada con éxito',
            'compra' => $compra,
        ]);
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return back()->with('success', 'Compra eliminada');
    }
}
