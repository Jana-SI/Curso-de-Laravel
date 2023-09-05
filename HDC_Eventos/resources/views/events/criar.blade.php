@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    <div id="evento-criar-container" class="col-md-6 offset-md-3">
        <h1>Crie um evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label for="imagem">Imagem do evento:</label>
                <input type="file" name="imagem" id="image" class="form-control-file" >
            </div>
            <div class="form-group">
                <label for="titulo">Evento:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="titulo">Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Local do evento">
            </div>
            <div class="form-group">
                <label for="titulo">O evento é privado?</label>
                <select name="privado" id="privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="titulo">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
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
            <input type="submit" value="Criar Evento" class="btn btn-primary">
        </form>
    </div>

@endsection
