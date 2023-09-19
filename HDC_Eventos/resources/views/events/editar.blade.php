@extends('layouts.main')

@section('title', 'Editando: ' . $evento->titulo)

@section('content')

    <div id="evento-criar-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $evento->titulo }}</h1>
        <form action="/events/atualizar/{{ $evento->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="imagem">Imagem do evento:</label>
                <input type="file" name="imagem" id="image" class="form-control-file">
                <img src="/img/events/{{ $evento->imagem }}" alt="{{ $evento->titulo }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="titulo">Evento:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Nome do evento"  value="{{ $evento->titulo }}">
            </div>
            <div class="form-group">
                <label for="data">Data do vento:</label>
                <input type="date" name="data" id="data" class="form-control" value="{{date('Y-m-d', strtotime($evento->data));}}">
            </div>
            <div class="form-group">
                <label for="titulo">Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Local do evento" value="{{ $evento->cidade}}">
            </div>
            <div class="form-group">
                <label for="titulo">O evento é privado?</label>
                <select name="privado" id="privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{ $evento->privado == 1 ? "selected='selected'" : ""}}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="titulo">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="O que vai acontecer no evento?">{{ $evento->descricao }}</textarea>
            </div>

            <div class="form-group">
                <label for="titulo">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="itens" value="Cadeiras">Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="itens" value="Palco">Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="itens" value="Cerveja grátis">Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="itens" value="Open Food">Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="itens" value="Brindes">Brindes
                </div>
            </div>
            <input type="submit" value="Editar Evento" class="btn btn-primary">
        </form>
    </div>

@endsection
