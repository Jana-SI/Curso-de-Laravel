@extends('layouts.main')

@section('title', $evento->titulo)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="imagem-container" class="col-md-6">
                <img src="/img/events/{{ $evento->imagem }}" alt="{{ $evento->titulo }}" class="img-fluid">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $evento->titulo }}</h1>
                <p class="evento-cidade">
                    <ion-icon name="location-outline"></ion-icon>
                    {{ $evento->cidade }}
                </p>
                <p class="evento-participantes">
                    <ion-icon name="people-outline"></ion-icon>
                    X Participantes
                </p>
                <p class="evento-dono">
                    <ion-icon name="star-outline"></ion-icon>
                    Dono do Evento
                </p>
                <a href="" class="btn btn-primary" id="evento-submit">Confirmar Presença</a>
                <div class="col-md-12" id="descricao-container">
                    <h3>Sobre o evento:</h3>
                    <p class="evento-descricao">
                        {{ $evento->descricao }}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
