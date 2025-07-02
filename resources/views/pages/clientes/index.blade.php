@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <section>
        <h2>Gestión de clientes</h2>
        
        <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>País</th>
                <th>Edad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
    </section>
@endsection


<style>
    section{
        padding: 20px;
    }
</style>