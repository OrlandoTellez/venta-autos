<?php
namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(15);

        return view('pages.proveedores.index', [
            'proveedores' => $proveedores,
            'colors' => true,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'contacto' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'max:100'],
        ]);

        $proveedor = Proveedor::create($validated);

        return response()->json([
            'message' => 'Cliente registrado con éxito',
            'proveedor' => $proveedor
        ], 201);
    }

    public function destroy(Proveedor $proveedor)   // type‑hint ⇒ encuentra por id
    {
        $proveedor->delete();
        return back()->with('success', 'Cliente eliminado');
    }
}