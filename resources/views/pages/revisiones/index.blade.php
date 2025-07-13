@extends('layouts.app')

@section('title', 'revisiones')

@section('content')
    <section>
        <article class="contenedor-texto">
            <div>
                <h2>Gestión de revisiones</h2>
                <p>Control de mantenimiento de vehículos</p>
            </div>
            <x-boton icono="signo-mas" texto="Registrar Compra" class="btn-registrarRevision" />
        </article>

        <article>
            <div class="cards">

                <x-tarjeta-total titulo="Revisiones hoy" valor="{{ count($revisiones) }}" icono="clientes" />

                <x-tarjeta-total titulo="Revisiones este mes" valor="{{ count($revisiones) }}" icono="clientes" />
                <x-tarjeta-total titulo="Ingresos del mes" valor="{{ count($revisiones) }}" icono="clientes" />

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
                            <th>Coche</th>
                            <th>Matricula</th>
                            <th>Servicios</th>
                            <th>Otros</th>
                            <th>Fecha</th>
                            <th>Costo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revisiones as $index => $rev)
                            @php
                                $bg = $index % 2 ? '#fff' : '#F5F5F5';
                            @endphp
                            <tr style="background:{{ $bg }}">
                                <td>{{ $rev->coche->modelo }} — {{ $rev->coche->color }}</td>
                                <td>{{ $rev->coche->matricula }}</td>

                                <td>
                                    @if($rev->cambio_filtro) Cambio de filtro<br>@endif
                                    @if($rev->cambio_aceite) Cambio de aceite<br>@endif
                                    @if($rev->cambio_frenos) Cambio de frenos @endif
                                </td>

                                <td>{{ $rev->otros }}</td>
                                <td>{{ $rev->fecha->format('Y-m-d') }}</td>
                                <td>{{ number_format($rev->costo, 2) }}</td>
                                <td>
                                    <form action="{{ route('revisiones.destroy', $rev) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button>🗑</button>
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
                        <h2 class="modal-title">Registrar nueva revisión</h2>
                        <span class="btn-cerrar" aria-label="Cerrar">×</span>
                    </div>

                    <form class="register-form" action="{{ route('revisiones.store') }}" method="POST">
                        @csrf
                        <label>
                            Coche
                            <select name="coche_id" required>
                                <option value="" selected disabled>— Seleccione un coche —</option>
                                @foreach ($coches as $coche)
                                    <option value="{{ $coche->id }}" {{ old('coche_id') == $coche->id ? 'selected' : '' }}>
                                        {{ $coche->modelo }} — {{ $coche->color }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        <!-- checkboxes: value=1 para que se envíen como true -->
                        <label><input type="checkbox" name="cambio_filtro" value="1"> Cambio de filtro</label>
                        <label><input type="checkbox" name="cambio_aceite" value="1"> Cambio de aceite</label>
                        <label><input type="checkbox" name="cambio_frenos" value="1"> Cambio de frenos</label>

                        <label>
                            Otros servicios
                            <input name="otros" type="text">
                        </label>

                        <label>
                            Fecha de revisión
                            <input name="fecha" type="date" required>
                        </label>
                        <label>
                            Costo de revisión (C$)
                            <input name="costo" type="number" step="0.01" min="0" required>
                        </label>
                        <button>Guardar Revisión</button>
                    </form>
                </div>
            </div>
        </template>

        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const $btnOpen = document.querySelector('.btn-registrarRevision');
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
                                const resp = await fetch("{{ route('revisiones.store') }}", {
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