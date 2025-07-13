<header id="sidebar" class="header">
    <h1>
    <a href="/" class="logo">
        Zenner automotriz
    </a>
    </h1>
    <nav class="nav">
        <a href="{{ route('pages.dashboard.index') }}">Dashboard</a>
        <a href="{{ route('clientes.index') }}">Clientes</a>
        <a href="{{ route('coches.index') }}">Coches</a>
        <a href="{{ route('compras.index') }}">Compras</a>
        <a href="{{ route('revisiones.index') }}">Revisiones</a>
        <a href="{{ route('agencias.index') }}">Agencias</a>
        <a href="{{ route('proveedores.index') }}">Proveedores</a>
    </nav>
</header>

<style>
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background-color: #0f172a;
        color: white;
        padding: 1rem;
        transition: transform 0.3s ease;
        z-index: 998;
        transform: translateX(-100%); 
    }

    .header.active {
        transform: translateX(0); 
    }

    .nav {
        display: flex;
        flex-direction: column;
        padding: 1rem 0;
    }

    .nav a {
        text-decoration: none;
        color: #cbd5e1;
        font-size: 1.2rem;
        margin: 0.5rem 0;
        transition: color 0.1s ease-in-out;
        padding: 0.5rem 1rem;
        border-radius: 15px;
    }

    .nav a:hover,
    .nav a:focus {
        color: #007BFF;
        background-color: #f0f7ff;
    }

    .logo {
        display: flex;
        align-items: center;
    }

    @media only screen and (min-width: 1024px) {
        .header {
            transform: translateX(0); 
            width: 20%;
        }

        .header.active {
            transform: translateX(0); 
        }
    }

</style>