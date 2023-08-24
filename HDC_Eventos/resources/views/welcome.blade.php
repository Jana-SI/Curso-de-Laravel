@extends('layouts.main')

@section('title', 'HDC Eventos')

@section('content')

    <h1>Aula 13 - Utilizando o Eloquent do Laravel</h1>

    @foreach ($eventos as $evento)
        <p>{{ $evento->titulo }} - {{ $evento->descricao }} </p>
    @endforeach
@endsection
