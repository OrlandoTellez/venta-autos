<form class="register-form" action="{{ route('registro.store') }}" method="POST">
    @csrf

    <label for="">
        <h2>Crear Cuenta</h2>
        <p class="subtitle">Regístrate en el Sistema de Gestión Automotriz</p>
    </label>
    <div class="row">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input name="nombre" type="text" id="nombre" placeholder="Tu nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input name="apellido" type="text" id="apellido" placeholder="Tu apellido" required>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="email" id="email" placeholder="tu@email.com" required>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input name="telefono" type="tel" id="telefono" placeholder="Tu teléfono" required>
    </div>
    <div class="form-group">
        <label for="contrasena">Contraseña</label>
        <input name="password" type="password" id="contrasena" placeholder="Mínimo 6 caracteres" required>
    </div>
    <div class="form-group">
        <label for="confirmar">Confirmar Contraseña</label>
        <input type="password" id="confirmar" placeholder="Confirma tu contraseña" required>
    </div>
    <button type="submit">Crear Cuenta</button>
</form>
<p class="login-link">¿Ya tienes una cuenta? <a href="#">Inicia sesión aquí</a></p>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const $form = document.querySelector('.register-form');

        document.body.style.overflow = 'hidden';

        $form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const datos = Object.fromEntries(new FormData($form));

            try {
                const resp = await fetch("{{ route('registro.store') }}", {
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
                window.location.href = '/login'

            } catch (err) {
                alert(err.message);
            }
        });
    });


</script>

<style>
    .form-container {
        background-color: #ffffff;
        padding: 30px 40px;
        border-radius: 10px;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 10px;
    }

    .subtitle {
        text-align: center;
        color: #666;
        font-size: 14px;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    .form-group {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
    }

    label {
        font-size: 14px;
        margin-bottom: 5px;
        color: #333;
    }

    input {
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    .row {
        display: flex;
        gap: 10px;
    }

    .row .form-group {
        flex: 1;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #1877f2;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0f65d4;
    }

    .login-link {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    .login-link a {
        color: #1877f2;
        text-decoration: none;
    }

    .login-link a:hover {
        text-decoration: underline;
    }
</style>