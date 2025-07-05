<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function index()
    {
        $coches = [
             [
                'matricula' => 'ABC-123',
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'color' => 'Rojo',
                'precio' => 15000,
                'cliente' => 'Juan Pérez',
                'estado' => 'Disponible'
            ],
            [
                'matricula' => 'XYZ-456',
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'color' => 'Azul',
                'precio' => 18000,
                'cliente' => 'Ana Gómez',
                'estado' => 'Vendido'
            ],
            
        ];
        return view('pages.coches.index', [
            'coches' => $coches,
            'colors' => true
        ]);
    }

    public function destroy(string $matricula)
    {
        // Aquí haces la lógica de borrar usuario con ese email (si es base de datos, etc.)
        return redirect()->back()->with('message', "coche con matricula ${matricula} eliminado.");
    }
}