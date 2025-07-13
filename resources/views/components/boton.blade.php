@props(['texto', 'icono'])

<button {{ $attributes->merge(['class' => 'boton']) }}>
    <x-icon :nombreIcono="$icono"/>
    {{$texto}}
</button>

<style>
    .boton{
        background-color: #2563eb;
        border: none;
        border-radius: 10px;
        color: white; 
        padding: 0px 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>