<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;

class EventoController extends Controller
{
    public function index(){

        $eventos = Evento::all();
    
        return view('welcome',['eventos' => $eventos]);
        
    }

    public function criar(){
        return view('events.criar');
    }

    public function store(Request $request){
        $evento = new Evento;

        $evento->titulo = $request->titulo;
        $evento->data = $request->data;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;
        $evento->itens = $request->itens;

        /* imagem upload */
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            
            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemNome = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->imagem->move(public_path('img/events'), $imagemNome);

            $evento->imagem = $imagemNome;
        }

        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function mostrar($id){
    
        $evento = Evento::findOrFail($id);
    
        return view('events.mostrar', ['evento' => $evento]);
    }
}