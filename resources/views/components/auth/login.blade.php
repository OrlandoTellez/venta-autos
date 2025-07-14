
<form class="Box" id="login-form">
    <label class="title">
        <h1>Inicia Sesión</h1>
        <h2>Ingresa a tu cuenta del Sistema de Gestión Automotriz</h2>
    </label>

    <label class="Form_Title">Email</label>
    <div class="Form_Input">
        <input name="email" type="email" placeholder="tu@gmail.com" required>
    </div>

    <label class="Form_Title">Contraseña</label>
    <div class="Form_Input">
        <input name="password" type="password" placeholder="Tu contraseña" required>
    </div>

    <button type="submit">Iniciar Sesión</button>

    <h2>¿No tienes una cuenta? <a href="{{ route('registro.form') }}">Regístrate aquí</a></h2>
</form>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('login-form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        try {
            const resp = await fetch("{{ route('login.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: new FormData(form)
            });

            if (!resp.ok) {
                const error = await resp.json();
                throw new Error(error.message);
            }

            // éxito
            window.location.href = "{{ url('/') }}";   //  redirige al dashboard
        } catch (err) {
            alert(err.message);
        }
    });
});
</script>
<style>
    .Box {
        background-color: #fff;
        padding: 20px;
        margin: auto;
        margin-top: 50px;
    }

    .title{
        width: 100%;
        display: grid;
        place-items: center;
    }

    .Form_Input {
        padding: 10px 20px;
    }

    .Form_Title {
        text-align: left;
        font-family: sans-serif;
        font-size: 14px;
        color: #000;
        margin: 20px;
        margin-top: 10px;
    }

    input {
        width: 100%;
        box-sizing: border-box;
        padding: 6px 12px;
        border: None;
        border: 1px solid #666;
        border-radius: 8px;
        background: transparent;

    }

    button {
        width: 100%;
        box-sizing: border-box;
        padding: 6px 12px;
        border: None;
        border-radius: 8px;
        background-color: #00f;
        color: #fff;
        font-family: Helvetica;
        font-size: 16px;
    }
</style>