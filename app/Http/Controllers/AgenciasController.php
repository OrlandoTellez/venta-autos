<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgenciasController extends Controller
{
    public function index()
    {
        return view('pages.agencias.index');
    }
}