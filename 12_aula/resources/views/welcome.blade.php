@extends('layouts.main')

@section('title', 'HDC Eventos')

@section('content')

    <h1>Aula 12 - Avançando em migrations do Laravel</h1>

    <p>Comandos:</p>
    <ul>
        <li>php artisan migrate</li>
        <li>adição de campo:</li>
        <ul>
            <li>php artisan make:migration add_categoria_to_produtos_table</li>
        </ul>

        <li>php artisan migrate:status</li>

        <li>php artisan migrate:rollback</li>

        <li>php artisan migrate:reset</li>

        <li>php artisan migrate:refresh</li>

        <li>php artisan migrate:fresh
            
        </li>
    </ul>
@endsection
