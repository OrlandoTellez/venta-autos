<div class="card">
    <div>
        <img src={{$icono}} alt="icon" />
    </div>
    <div>
        <p>{{$titulo}}</p>
        <h2>{{$valor}}</h2>
    </div>
</div>

<style>
    .card {
        display: flex;
        background-color: #fff;
        padding: 10px 25px;
        width: 100%;
        border-radius: 10px;
        justify-content: space-between;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        background-color: #f0f0f0;
    }

    .card img {
        width: 50px;
        height: 50px;
    }
</style>