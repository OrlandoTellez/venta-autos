@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

    <section>
        <article class="contenedor-texto">
            <div>
                <h2>Gestión de clientes</h2>
                <p>Administra la información de tus clientes</p>
            </div>
            <x-boton icono="signo-mas" texto="Registrar coche" class="btn-registrarCliente" />
        </article>

        <article>
            <div class="cards">

                <x-tarjeta-total titulo="Total de clientes" valor="{{ count($users) }}" icono="clientes" />

                <x-tarjeta-total titulo="Total de clientes" valor="{{ count($users) }}" icono="clientes" />
                <x-tarjeta-total titulo="Total de clientes" valor="{{ count($users) }}" icono="clientes" />

            </div>
        </article>

        <article class="tabla">
            <form action="">
                <input type="text" placeholder="Buscar cliente por nombre, ciudad o telefono">
            </form>
            <div>
                <table border="0" cellpadding="6" cellspacing="0">
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
                    <tbody id="clientes-body">
                        @foreach ($users as $index => $user)
                            @php
                                $backgroundColor = $index % 2 === 0 ? '#F5F5F5' : '#fff';
                                $showColor = $colors ? $backgroundColor : 'transparent';
                            @endphp
                            <tr style="background-color: {{ $showColor }}; color: black;">
                                <td>{{ $user->nombre }}</td>
                                <td>{{ $user->direccion }}</td>
                                <td>{{ $user->ciudad }}</td>
                                <td>{{ $user->telefono }}</td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <form action="{{ route('user.delete', ['cliente' => $user->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div>
                                            <button type="submit">Borrar</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </article>

        <template id="perfil-modal-template">
            <div class="modal-overlay">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Registrar cliente</h2>
                        <span class="btn-cerrar" aria-label="Cerrar">×</span>
                    </div>

                    <form class="register-form" action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <label>
                            Nombre completo
                            <input name="nombre" type="text" placeholder="Ingrese nombre del empleado" required>
                        </label>

                        <label>
                            Dirección
                            <input name="direccion" type="text" placeholder="Ingrese la dirección del empleado" required>
                        </label>

                        <label>
                            Ciudad
                            <input name="ciudad" type="text" placeholder="Ingrese la ciudad del empleado" required>
                        </label>

                        <label>
                            Teléfono
                            <input name="telefono" type="text" placeholder="Ingrese el número del empleado" required>
                        </label>

                        <button type="submit" class="submit-button">Guardar cliente</button>
                    </form>
                </div>
            </div>
        </template>


        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const $btnOpen = document.querySelector('.btn-registrarCliente');
                    if (!$btnOpen) return;

                    const $tpl = document.getElementById('perfil-modal-template');

                    $btnOpen.addEventListener('click', () => {
                        const fragment = $tpl.content.cloneNode(true);
                        document.body.appendChild(fragment);

                        const $overlay = document.body.lastElementChild;
                        requestAnimationFrame(() => $overlay.style.opacity = '1');

                        const $btnCerrar = $overlay.querySelector('.btn-cerrar');
                        const $form = $overlay.querySelector('.register-form');

                        const close = () => {
                            $overlay.style.opacity = '0';
                            setTimeout(() => $overlay.remove(), 200);
                            document.body.style.overflow = '';
                        };

                        $btnCerrar.addEventListener('click', close);
                        $overlay.addEventListener('click', e => {
                            if (e.target === $overlay) close();
                        });
                        document.addEventListener('keydown', function onKey(e) {
                            if (e.key === 'Escape') { close(); document.removeEventListener('keydown', onKey); }
                        });

                        document.body.style.overflow = 'hidden';

                        $form.addEventListener('submit', async (e) => {
                            e.preventDefault();
                            const datos = Object.fromEntries(new FormData($form));

                            try {
                                const resp = await fetch("{{ route('clientes.store') }}", {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                        'Accept': 'application/json'
                                    },
                                    body: new FormData($form),   // usa directamente FormData
                                });

                                if (!resp.ok) {
                                    const err = await resp.json();
                                    throw new Error(err.message ?? 'Error al registrar');
                                }

                                const json = await resp.json();
                                console.log(json.message);

                                close();
                                location.reload()

                            } catch (err) {
                                alert(err.message);
                            }
                        });
                    });


                });
            </script>
        @endpush

    </section>


@endsection


<style>
    section {
        width: 100%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .contenedor-texto {
        display: flex;
        justify-content: space-between;
    }

    table {
        width: 100%;
        background-color: white;
        border: 1px solid #cbd5e1;
        border-radius: 5px;
    }

    th {
        padding: 10px;
    }

    tr {
        text-align: center;
    }

    td {
        padding: 10px;
    }

    .cards {
        display: grid;
        gap: 10px;
        padding: 0;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }

 
</style>