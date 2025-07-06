<header id="sidebar" class="header">
    <h1>
    <a href="/" class="logo">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-car h-8 w-8 text-blue-400" data-lov-id="src/components/Layout/Sidebar.tsx:44:12" data-lov-name="Car" data-component-path="src/components/Layout/Sidebar.tsx" data-component-line="44" data-component-file="Sidebar.tsx" data-component-name="Car" data-component-content="%7B%22className%22%3A%22h-8%20w-8%20text-blue-400%22%7D"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg>
        AutoSys
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
        transform: translateX(-100%); /* Oculto por defecto en móvil */
    }

    .header.active {
        transform: translateX(0); /* Mostrar cuando está activo */
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

    /* 💻 Escritorio */
    @media only screen and (min-width: 1024px) {
        .header {
            transform: translateX(0); 
            width: 20%;
        }

        .header.active {
            transform: translateX(0); /* Ya no es necesario, pero por compatibilidad se deja */
        }
    }

</style>