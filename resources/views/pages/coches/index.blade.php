@extends('layouts.app')

@section('title', 'Coches')

@section('content')
     <section>
        <article>
            <h2>Gestión de coches</h2>
            <p>Administra la información de tus coches</p>
        </article>

        <article>
            <div class="cards">

                <x-tarjeta-total 
                    titulo="Total de coches"
                    valor="{{ count($coches) }}"
                    icono="clientes"
                />

                <x-tarjeta-total 
                    titulo="Disponibles"
                    valor="{{ count($coches) }}"
                    icono="clientes"
                />
                <x-tarjeta-total 
                    titulo="Vendidos"
                    valor="{{ count($coches) }}"
                    icono="clientes"
                />

                <x-tarjeta-total 
                    titulo="Valor total C$"
                    valor="{{ count($coches) }}"
                    icono="clientes"
                />
    
            </div>
        </article>

        <article class="tabla">
            <form action="">
                <input 
                type="text"
                placeholder="Buscar coches por matricula, marca o modelo"
                >
            </form>
            <table border="0" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Precio C$</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coches as $index => $coches)
                        @php
                            $backgroundColor = $index % 2 === 0 ? '#F5F5F5' : '#fff';
                            $showColor = $colors ? $backgroundColor : 'transparent';
                        @endphp
                        <tr style="background-color: {{ $showColor }}; color: black;">
                            <td>{{ $coches['matricula'] }}</td>
                            <td>{{ $coches['marca'] }}</td>
                            <td>{{ $coches['modelo'] }}</td>
                            <td>{{ $coches['color'] }}</td>
                            <td>{{ $coches['precio'] }}</td>
                            <td>{{ $coches['estado'] }}</td>
                            <td>{{ $coches['precio'] }}</td>
                            <td>
                                <form action="{{ route('coches.delete', ['matricula' => $coches['matricula']]) }}" method="POST">
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
        border: 1px solid #cbd5e1;
        border-radius: 5px;
    }

    th{
        padding: 10px;
    }
    
    tr{
        text-align: center;
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
            border: 1px solid #cbd5e1;
        }
    }
</style>