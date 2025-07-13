@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
    <section>
        <article class="contenedor-texto">
            <div>
                <h2>Gestión de proveedores</h2>
                <p>Administra proveedores</p>
            </div>
            <x-boton icono="signo-mas" texto="Registrar proveedores" class="btn-registrarProveedor" />
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
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Fecha de registro</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="clientes-body">
                        @foreach ($proveedores as $index => $proveedor)
                            @php
                                $backgroundColor = $index % 2 === 0 ? '#F5F5F5' : '#fff';
                                $showColor = $colors ? $backgroundColor : 'transparent';
                            @endphp
                            <tr style="background-color: {{ $showColor }}; color: black;">
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->contacto }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->email }}</td>
                                <td>{{ $proveedor->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <form action="{{ route('proveedor.delete', ['proveedor' => $proveedor->id]) }}" method="POST">
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
                        <h2 class="modal-title">Registrar Proveedor</h2>
                        <span class="btn-cerrar" aria-label="Cerrar">×</span>
                    </div>

                    <form class="register-form" action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <label>
                            Nombre del proveedor
                            <input name="nombre" type="text" placeholder="" required>
                        </label>

                        <label>
                            Persona en Contacto
                                <input name="contacto" type="text" placeholder="" required>
                        </label>

                        <label>
                            Telefono
                            <input name="telefono" type="text" placeholder="Ingrese la direccion" required>
                        </label>

                        <label>
                            Email
                            <input name="email" type="email" placeholder="Ingrese el número" required>
                        </label>

                        <button type="submit" class="submit-button">Guardar cliente</button>
                    </form>
                </div>
            </div>
        </template>


        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const $btnOpen = document.querySelector('.btn-registrarProveedor');
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
                                const resp = await fetch("{{ route('proveedores.store') }}", {
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