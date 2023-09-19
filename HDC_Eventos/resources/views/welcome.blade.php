@extends('layouts.main')

@section('title', 'HDC Eventos')

@section('content')
    <div id="pesquisa-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" name="pesquisa" id="pequisa" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="eventos-container" class="col-md-12">
        @if ($pesquisa)
            <h2>Buscando por: {{ $pesquisa }}</h2>
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($eventos as $evento)
                <div class="card col-md-3">
                    <img src="/img/events/{{ $evento->imagem }}" alt="{{ $evento->titulo }}">

                    <div class="card-body">
                        <div class="card-date">{{ date('d/m/Y', strtotime($evento->data)) }}</div>

                        <h5 class="card-title">{{ $evento->titulo }}</h5>

                        <p class="card-participantes">{{ count($evento->usuarios) }} participantes</p>

                        <a href="/events/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach

            @if (count($eventos) == 0 && $pesquisa)
                <p>Não foi possível encontrar nenhum evento com {{ $pesquisa }}! <a href="/">Ver todos!</a></p>
            @elseif(count($eventos) == 0)
                <p>Não há eventos disponíveis</p>
            @endif
        </div>
    </div>
@endsection
