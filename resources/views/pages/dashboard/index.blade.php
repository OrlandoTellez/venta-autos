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

        <div class="tablaCliente"> 
            @foreach ($users as $index => $user)
                @php
                    $backgroundColor = $index % 2 === 0 ? '#333' : '#000';
                    $showColor = $colors ? $backgroundColor : 'transparent';
                @endphp
                <tr style="background-color: {{ $showColor }}; color: white;">
                    <td><img src="{{ $user['picture']['thumbnail'] }}" alt="foto" /></td>
                    <td>{{ $user['name']['first'] }}</td>
                    <td>{{ $user['name']['last'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['phone'] }}</td>
                    <td>{{ $user['location']['country'] }}</td>
                    <td>{{ $user['dob']['age'] }}</td>
                    <td>
                        <form action="{{ route('user.delete', ['email' => $user['email']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
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

    .tablaCliente{
        width: 100%;
    }
</style>