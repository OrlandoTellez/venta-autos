<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mi sitio')</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html{
            font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol, "Noto Color Emoji";
        }

        body {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(5, 1fr);
            gap: 8px;
            background: #f9fafb;
        }

        a{
            text-decoration: none;
            color: white;
        }

        .div2 {
            grid-column: span 4 / span 4;
            grid-row: span 5 / span 5;
            margin-left: 25%;
            width: 100%;
        }
        

    </style>
</head>
<body>
    <x-menu />
    
    <main class="div2">
        <x-header />
        @yield('content')
    </main>
</body>
</html>
