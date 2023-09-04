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
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;

        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
}
