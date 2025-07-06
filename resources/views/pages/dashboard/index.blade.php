@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <section>
        <h2>Dashboard</h2>
        <p>Resumen general del sistema.</p>

        @php
            $tarjetas = [
               [
                    'titulo' => 'Total clientes',
                    'valor' => 1234,
                    'porcentaje' => 11,
                    'icono' => 'clientes'
                ],
                [
                    'titulo' => 'Coches en stock',
                    'valor' => 89,
                    'porcentaje' => 8,
                    'icono' => 'coches'
                ],
                [
                    'titulo' => 'Ventas este mes',
                    'valor' => 23,
                    'porcentaje' => 15,
                    'icono' => 'carritoCompra'
                ],
                [
                    'titulo' => 'Revisiones pendientes',
                    'valor' => 15,
                    'porcentaje' => 5,
                    'icono' => 'calendario'
                ] 
            ]
        @endphp

        <div class="cards">
           @foreach ($tarjetas as $tarjeta)
                <x-tarjeta-resumen 
                :titulo="$tarjeta['titulo']"
                :valor="$tarjeta['valor']"
                :porcentaje="$tarjeta['porcentaje']"
                :icono="$tarjeta['icono']"
                /> 
           @endforeach
        </div>
    </section>
@endsection

<style>
    section{
        width: 100%;
        padding: 20px;
    }

    .cards{
        display: grid;
        gap: 10px;
        padding: 0;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
</style>