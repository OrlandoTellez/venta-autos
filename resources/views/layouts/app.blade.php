<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

        button{
            cursor: pointer;
        }

        @media only screen and (min-width: 1024px) {
            body {
            }

            .menu-toggle {
                display: none; 
            }

            .div2{
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
