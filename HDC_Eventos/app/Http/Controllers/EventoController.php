<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\User;

class EventoController extends Controller
{
    public function index(){

        $pesquisa = request('pesquisa');

        if ($pesquisa) {
            $eventos = Evento::where([
                ['titulo','like','%'.$pesquisa.'%']
            ])->get();
        } else {
            $eventos = Evento::all();
        }
    
        return view('welcome',['eventos' => $eventos, 'pesquisa' => $pesquisa]);
        
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

        $usuario = auth()->user();
        $evento->usuario_id = $usuario->id;

        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function mostrar($id){
    
        $evento = Evento::findOrFail($id);

        $donoEvento = User::where('id', $evento->usuario_id)->first()->toArray();
    
        return view('events.mostrar', ['evento' => $evento, 'donoEvento' => $donoEvento]);
    }

    public function dashboard(){
        $usuario = auth()->user();
    
        $eventos = $usuario->eventos()->get(); // Use ->get() para obter a coleção de eventos
    
        return view('events.dashboard', ['eventos' => $eventos]);
    }
    
}