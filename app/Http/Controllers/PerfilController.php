<?php

namespace App\Http\Controllers;

class PerfilController extends Controller
{
    public function index()
    {
        return view(view: "pages.perfil.index");
    }
}