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

        $usuario = auth()->user();

        $confirmouPresenca = false;

        if($usuario){

            $usuarioEventos = $usuario->eventosParticipante->toArray();

            foreach($usuarioEventos as $usuarioEvento) {
                if($usuarioEvento['id'] == $id){
                    $confirmouPresenca = true;
                }
            }
        } 

        $donoEvento = User::where('id', $evento->usuario_id)->first()->toArray();
    
        return view('events.mostrar', ['evento' => $evento, 'donoEvento' => $donoEvento, 'confirmouPresenca' => $confirmouPresenca]);
    }

    public function dashboard(){
        $usuario = auth()->user();
    
        $eventos = $usuario->eventos()->get(); // Use ->get() para obter a coleção de eventos

        $eventosParticipante = $usuario->eventosParticipante;
    
        return view('events.dashboard', ['eventos' => $eventos, 'eventosParticipante' => $eventosParticipante]);
    }
    
    public function deletar($id){
        // Encontre o evento a ser excluído e obtenha o nome da imagem
        $evento = Evento::findOrFail($id);
        $imagemNome = $evento->imagem;
    
        // Exclua o evento do banco de dados
        $evento->delete();
    
        // Exclua a imagem do sistema de arquivos
        if (!empty($imagemNome) && file_exists(public_path('img/events/' . $imagemNome))) {
            unlink(public_path('img/events/' . $imagemNome));
        }
    
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso');
    }    

    public function editar($id){
        
        $usuario = auth()->user();

        $evento = Evento::findorFail($id);

        if ($usuario->id != $evento->usuario_id) {
            return redirect('/dashboard');
        }

        return view('events.editar', ['evento' => $evento]);
    }

    public function atualizar(Request $request, $id){
        $evento = Evento::findOrFail($id);
        $data = $request->all();
    
        // Verifique se uma nova imagem foi enviada
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            // Obtenha o nome da imagem antiga
            $imagemAntiga = $evento->imagem;
    
            // Faça o upload da nova imagem
            $requestImagem = $request->imagem;
            $extension = $requestImagem->extension();
            $imagemNome = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->imagem->move(public_path('img/events'), $imagemNome);
    
            // Atualize o nome da imagem no array de dados
            $data['imagem'] = $imagemNome;
    
            // Exclua a imagem antiga, se existir
            if (!empty($imagemAntiga) && file_exists(public_path('img/events/' . $imagemAntiga))) {
                unlink(public_path('img/events/' . $imagemAntiga));
            }
        }
    
        // Atualize os outros dados do evento
        $evento->update($data);
    
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }
    
    public function participarEvento($id){
        $usuario = auth()->user();

        $usuario->eventosParticipante()->attach($id);

        $evento = Evento::findOrFail($id);

        return redirect('dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $evento->titulo);
    }

    public function sairEvento($id){
        $usuario = auth()->user();

        $usuario->eventosParticipante()->detach($id);

        $evento = Evento::findOrFail($id);

        return redirect('dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $evento->titulo);
    }
}