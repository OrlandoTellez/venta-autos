@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

    <section>
        <article>
            <h2>Gestión de clientes</h2>
            <p>Administra la información de tus clientes</p>
        </article>

        <article>
            <div class="cards">

                <x-tarjeta-total 
                    titulo="Total de clientes"
                    valor="{{ count($users) }}"
                    icono="users"
                />
    
                <x-tarjeta-total 
                    titulo="Total de clientes"
                    valor="{{ count($users) }}"
                    icono="users"
                />
    
                <x-tarjeta-total 
                    titulo="Total de clientes"
                    valor="{{ count($users) }}"
                    icono="users"
                />
            </div>
        </article>

        <article class="tabla">
            <form action="">
                <input 
                type="text"
                placeholder="Buscar cliente por nombre, ciudad o telefono"
                >
            </form>
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Teléfono</th>
                        <th>Fecha de registro</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        @php
                            $backgroundColor = $index % 2 === 0 ? '#F5F5F5' : '#fff';
                            $showColor = $colors ? $backgroundColor : 'transparent';
                        @endphp
                        <tr style="background-color: {{ $showColor }}; color: black;">
                            <td>{{ $user['nombre']['primerNombre'] }}</td>
                            <td>{{ $user['direccion'] }}</td>
                            <td>{{ $user['ciudad'] }}</td>
                            <td>{{ $user['telefono'] }}</td>
                            <td>{{ $user['fecha_de_registro'] }}</td>
                            <td>
                                <form action="{{ route('user.delete', ['nombre' => $user['nombre']['primerNombre']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>

        
    </section>
@endsection


<style>
    section{
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    table{
        width: 100%;
        background-color: white;

    }

    td{
        padding: 10px;
    }

    .cards{
        display: flex;
        gap: 10px;
        padding: 0;
    }

    .tabla{
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .tabla form{
        width: 100%;
        padding: 10px 0px;

        && input{
            width: 100%;
            padding: 5px;
            border-radius: 5px;
        }
    }
</style>