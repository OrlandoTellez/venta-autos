@extends('layouts.app')

@section('title', 'Coches')

@section('content')
    <section>
        <article class="contenedor-texto">
            <div>
                <h2>Gestión de coches</h2>
                <p>Administra la información de tus coches</p>
            </div>
            <x-boton icono="signo-mas" texto="Registrar Coche" class="btn-registrarCoche" />
        </article>

        <article>
            <div class="cards">

                <x-tarjeta-total titulo="Total de coches" valor="{{ count($coches) }}" icono="clientes" />

                <x-tarjeta-total titulo="Disponibles" valor="{{ count($coches) }}" icono="clientes" />
                <x-tarjeta-total titulo="Vendidos" valor="{{ count($coches) }}" icono="clientes" />

                <x-tarjeta-total titulo="Valor total C$" valor="{{ count($coches) }}" icono="clientes" />

            </div>
        </article>

        <article class="tabla">
            <form action="">
                <input type="text" placeholder="Buscar coches por matricula, marca o modelo">
            </form>
            <div>
                <table border="0" cellpadding="6" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>Precio C$</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coches as $index => $coche)
                            @php
                                $backgroundColor = $index % 2 === 0 ? '#F5F5F5' : '#fff';
                                $showColor = $colors ? $backgroundColor : 'transparent';
                            @endphp
                            <tr style="background-color: {{ $showColor }}; color: black;">
                                <td>{{ $coche->matricula }}</td>
                                <td>{{ $coche->marca }}</td>
                                <td>{{ $coche->modelo }}</td>
                                <td>{{ $coche->color }}</td>
                                <td>{{ $coche->precio }}</td>
                                <td>Nuevo</td>
                                <td>
                                    <form 
                                    action="{{ route('coche.delete', ['coche' => $coche->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Borrar</button>
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
                        <h2 class="modal-title">Registrar nuevo coche</h2>
                        <span class="btn-cerrar" aria-label="Cerrar">×</span>
                    </div>

                    <form class="register-form" action="{{ route('coches.store') }}" method="POST">
                        @csrf
                        <label>
                            Matrícula
                            <input name="matricula" type="text" placeholder="ABC-1234" required>
                        </label>

                        <label>
                            Marca
                            <input name="marca" type="text" placeholder="Ingresar marca" required>
                        </label>

                        <label>
                            Modelo
                            <input name="modelo" type="text" placeholder="Ingresar modelo" required>
                        </label>

                        <label>
                            Color
                            <input name="color" type="text" placeholder="Ingresar color" required>
                        </label>

                        <label>
                            Precio(C$)
                            <input name="precio" type="text" placeholder="" required>
                        </label>

                        <button type="submit" class="submit-button">Guardar Coche</button>
                    </form>
                </div>
            </div>
        </template>

        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const $btnOpen = document.querySelector('.btn-registrarCoche');
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
                                const resp = await fetch("{{ route('coches.store') }}", {
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

    table {
        width: 100%;
        background-color: white;
        border: 1px solid #cbd5e1;
        border-radius: 5px;
    }

    .contenedor-texto {
        display: flex;
        justify-content: space-between;
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

    .tabla {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .tabla div {
        overflow-x: scroll;
    }

    .tabla form {
        width: 100%;
        padding: 10px 0px;

        && input {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #cbd5e1;
        }
    }
</style>