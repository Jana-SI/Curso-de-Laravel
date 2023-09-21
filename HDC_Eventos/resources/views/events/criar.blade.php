@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    <div id="evento-criar-container" class="col-md-6 offset-md-3">
        <h1>Crie um evento</h1>
        <form class="row g-3" action="/events" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="col-12">
                <label for="imagem">Imagem do evento:</label>
                <input type="file" name="imagem" id="imagem" class="form-control-file">
                @error('imagem')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="titulo">Evento:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Nome do evento">
                @error('titulo')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="data">Data do evento:</label>
                <input type="date" name="data" id="data" class="form-control">
                @error('data')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Local do evento">
                @error('cidade')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="privado">O evento é privado?</label>
                <select name="privado" id="privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
                @error('privado')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
                @error('descricao')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="itens">Adicione itens de infraestrutura:</label><br>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" role="switch" name="itens[]" id="Cadeiras" value="Cadeiras">Cadeiras
                </div>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" role="switch" name="itens[]" id="Palco" value="Palco">Palco
                </div>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" role="switch" name="itens[]" id="CervejaGratis" value="Cerveja grátis">Cerveja grátis
                </div>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" role="switch" name="itens[]" id="OpenFood" value="Open Food">Open Food
                </div>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" role="switch" name="itens[]" id="Brindes" value="Brindes">Brindes
                </div> 
                <br>           
                @error('itens')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror    
            </div>
            
            <div class="col-12">
                <input type="submit" value="Criar Evento" class="btn btn-primary">
            </div>
        </form>
    </div>

@endsection