@extends('layouts.main')

@section('title', 'HDC Eventos')

@section('content')
    <div id="pesquisa-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="text" name="pesquisa" id="pequisa" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="eventos-container" class="col-md-12">
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os ecentos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach ($eventos as $evento)
                <div class="card col-md-3">
                    <img src="/img/event_placeholder.jpg" alt="{{ $evento->titulo }}">

                    <div class="card-body">
                        <div class="card-date">10/09/2020</div>

                        <h5 class="card-title">{{ $evento->titulo }}</h5>

                        <p class="card-participantes">x participantes</p>

                        <a href="" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
