<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){

        $nome = "Janaina";
        $idade = 30;

        $arr = [1,2,3,4,5];
        $arr2 = [10,20,30,40,50];
        $nomes = ["Janaina", "Carlos", "Vitória"];
    
        return view('welcome',
            [
                'nome' => $nome, 
                'idade' => $idade, 
                'profissao' => "Programador",
                'arr' => $arr, 
                'arr2' => $arr2,
                'nomes' => $nomes
            ]);
        
    }

    public function criar(){
        return view('events.criar');
    }
}
