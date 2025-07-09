@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<section class="container">
    <h1>Mi Perfil</h1>
    <p class="subtitle">Gestiona tu información personal</p>
    
    <div class="profile-grid">    
        <section class="card">
            <h2>Información Personal</h2>
            <p class="section-subtitle">Actualiza tu información personal</p>
            <form>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" value="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" value="Demo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="usuario@demo.com">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" value="+34 123 456 789">
                </div>
                <button type="submit">Actualizar Perfil</button>
            </form>
        </section>
        
        <section class="card">
            <h2>Información de la Cuenta</h2>
            <p class="section-subtitle">Detalles de tu cuenta</p>
            <div class="info-item">
                <strong>Usuario</strong>
                <p>Usuario Demo</p>
            </div>
            <div class="info-item">
                <strong>Email</strong>
                <p>usuario@demo.com</p>
            </div>
            <div class="info-item">
                <strong>Teléfono</strong>
                <p>+34 123 456 789</p>
            </div>
            <div class="info-item">
                <strong>Miembro desde</strong>
                <p>14 de enero de 2024</p>
            </div>
        </section>
    </div>
    </main>
</section>
@endsection

<style>
    .container {
        padding: 20px 0px;
        max-width: 1000px;
        margin: auto;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .subtitle {
        color: #666;
        margin-bottom: 30px;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    .card {
        background-color: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .card h2 {
        font-size: 18px;
        margin-bottom: 5px;
    }

    .section-subtitle {
        font-size: 14px;
        color: #777;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    .form-row {
        display: flex;
        gap: 10px;
    }

    .form-group {
        flex: 1;
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    label {
        font-size: 14px;
        margin-bottom: 5px;
        color: #333;
    }

    input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    button {
        margin-top: 10px;
        background-color: #1877f2;
        color: white;
        border: none;
        padding: 12px;
        font-size: 15px;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0f65d4;
    }

    .info-item {
        margin-bottom: 20px;
    }

    .info-item strong {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #333;
    }

    .info-item p {
        font-size: 15px;
        color: #444;
    }

    @media (max-width: 768px) {
        .container{
            padding: 20px;
        }

        .profile-grid {
            grid-template-columns: 1fr;
        }

        .form-row {
            flex-direction: column;
        }
    }
</style>