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
                    'icono' => 'users'
                ],
                [
                    'titulo' => 'Coches en stock',
                    'valor' => 89,
                    'porcentaje' => 8,
                    'icono' => 'car'
                ],
                [
                    'titulo' => 'Ventas este mes',
                    'valor' => 23,
                    'porcentaje' => 15,
                    'icono' => 'shopping-cart'
                ],
                [
                    'titulo' => 'Revisiones pendientes',
                    'valor' => 15,
                    'porcentaje' => 5,
                    'icono' => 'wrench'
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
        padding: 20px;
    }

    .cards{
        display: flex;
        gap: 18px;
        width: 100%;
        padding: 20px 0;
    }
</style>