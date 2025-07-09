<form class="Box" action="">

    <label class="title">
        <h1>Inicia Sesión</h1>
        <h2>Ingresa a tu cuenta del Sistema de Gestión Automotriz</h2>
    </label>

    <label class="Form_Title">
        Email
    </label>
    <div class="Form_Input">
        <input type="text" placeholder="tu@gmail.com" required="required">
    </div>
    <label class="Form_Title">
        Contraseña
    </label>
    <div class="Form_Input">
        <input type="password" placeholder="Tu Contraseña" required="required">
    </div>
    <button>
        Iniciar Sesión
    </button>

    <h2>
        ¿No tienes una cuenta? <a href="index_registro.html">Regístrate aquí</a>
    </h2>
</form>

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