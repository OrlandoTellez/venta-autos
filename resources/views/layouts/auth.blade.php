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
            display: grid;
            place-items: center;
        }

        a {
            text-decoration: none;
            color: white;
        }

        main{
            max-width: 600px;
        }

        @media only screen and (min-width: 1024px) {
            body.menu-open .parent {
                filter: blur(2px);
            }
        }

    </style>
</head>
<body>    
    <main>
        @yield('content')
    </main>
</body>
</html>
