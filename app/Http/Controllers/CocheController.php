<?php
namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function index()
    {
        $coches = Coche::latest()->paginate(15);

        return view('pages.coches.index', [
            'coches' => $coches,
            'colors' => true,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'matricula' => ['required', 'string', 'max:150'],
            'marca' => ['required', 'string', 'max:255'],
            'modelo' => ['required', 'string', 'max:100'],
            'color' => ['required', 'string', 'max:20'],
            'precio' => ['required', 'string', 'max:20'],
        ]);

        $coche = Coche::create($validated);

        return response()->json([
            'message' => 'coche registrado con éxito',
            'coche' => $coche
        ], 201);
    }

    public function destroy(Coche $coche)
    {
        $coche->delete();
        return back()->with('success', 'Coche eliminado');
    }
}