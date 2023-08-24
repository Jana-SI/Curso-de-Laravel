@extends('layouts.main')

@section('title', 'HDC Eventos')

@section('content')

    <h1>Aula 11 - Introdução a migrations do Laravel</h1>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <tr>
                <td>
                    <p>{{ $nome }}</p>

                    @if ($nome == 'Pedro')
                        <p>O nome é Pedro</p>
                    @elseif($nome == 'Janaina')
                        <p>O nome é {{ $nome }} e sua idade é {{ $idade }} anos, e trabalha como
                            {{ $profissao }}</p>
                    @else
                        <p>O nome não é Pedro</p>
                    @endif
                </td>

                <td>
                    @for ($i = 0; $i < count($arr); $i++)
                        <p>{{ $arr[$i] }}</p>
                    @endfor
                </td>

                <td>
                    @for ($i = 0; $i < count($arr2); $i++)
                        <p>{{ $i }} - {{ $arr2[$i] }}</p>

                        @if ($i == 2)
                            <p>O "i" é 2</p>
                        @endif
                    @endfor
                </td>

                <td>
                    @foreach ($nomes as $nome)
                        <p>{{ $loop->index }}</p>
                        <p>{{ $nome }}</p>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>


@endsection
