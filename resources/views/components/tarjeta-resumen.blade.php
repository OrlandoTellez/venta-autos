@props(['titulo', 'valor', 'porcentaje', 'icono'])

<div class="card">
    <div>
        <p>{{$titulo}}</p>
        <h2>{{$valor}}</h2>
        <p><span>{{$porcentaje}}</span> vs last month</p>
    </div>
    <x-icon :nombreIcono="$icono" />
</div>

<style>
    .card{
        display: flex;
        background-color: #fff;
        padding: 10px 25px;
        width: 100%;
        border-radius: 10px;
        justify-content: space-between;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card:hover{
        background-color: #f0f0f0;
    }
</style>