<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mi sitio')</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html {
            font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol, "Noto Color Emoji";
        }

        body {
            width: 100%;
            gap: 8px;
            background: #f9fafb;
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .div2 {
            background: #f0f0f0;
            border-radius: 8px;
            height: 100vh;
        }


        .menu-toggle {
            display: block;
            position: fixed;
            top: 10px;
            left: 10px;
            font-size: 2rem;
            z-index: 999;
            background: white;
            border: none;
            cursor: pointer;
        }

        button {
            cursor: pointer;
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


        }

        input {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #cbd5e1;
        }

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .55);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            /* empieza invisible → fade‑in */
            transition: opacity .2s;
        }

        /* Caja blanca centrada */
        .modal-content {
            background: #fff;
            width: min(90%, 500px);
            border-radius: .75rem;
            padding: 2rem 1.5rem;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .25);
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }


        /* Encabezado */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
        }

        .submit-button {
            background-color: #2563eb;
            border: none;
            border-radius: 10px;
            color: white;
            padding: 10px 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-cerrar {
            cursor: pointer;
            font-size: 1.5rem;
            line-height: 1;
        }

        @media only screen and (min-width: 1024px) {
            body {}

            .menu-toggle {
                display: none;
            }

            .div2 {
                margin-left: 20%;
            }

            body.menu-open .parent {
                filter: blur(2px);
            }
        }
    </style>

    @stack('scripts')
</head>

<body>

    <div class="menu-toggle" onclick="toggleMenu()">☰</div>

    <x-menu />

    <main class="div2">
        <x-header />
        @yield('content')
    </main>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('sidebar');
            menu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        }
    </script>
</body>

</html>