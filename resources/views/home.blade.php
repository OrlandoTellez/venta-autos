@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <section>
        <h2>Dashboard</h2>
        <p>Resumen general del sistema.</p>

        <div class="cards">
            <x-tarjeta-resumen 
            titulo="Total cliente"
            valor="1234"
            porcentaje="11"
            icono="aa"
            />

            <x-tarjeta-resumen 
            titulo="Coches en stock"
            valor="89"
            porcentaje="11"
            icono="aa"
            />

            <x-tarjeta-resumen 
            titulo="Ventas este mes"
            valor="23"
            porcentaje="11"
            icono="aa"
            />

            <x-tarjeta-resumen 
            titulo="Revisiones pendientes"
            valor="15"
            porcentaje="11"
            icono="aa"
            />
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