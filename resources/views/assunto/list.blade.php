@extends('layouts.default')

@section('title', 'Assuntos')

@section('content')
    <div class="title-crud row">
        <div class="col-9">
            <h2>Assuntos</h2>
        </div>
        <div class="col-3">
            <a href="{{ url("assunto/criar") }}">
                <div class="btn list-create">Novo Assunto</div>
            </a>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
                </thead>
                <tbody>
                @if (empty($assuntos) === false)
                    @foreach ($assuntos as $assunto)
                        <tr>
                            <th scope="row">{{ $assunto['id'] }}</th>
                            <td>{{ $assunto['descricao'] ?? null }}</td>
                            <td><a href="{{ url("assunto/{$assunto['id']}/editar") }}">Editar</a></td>
                            <td>
                                <form action="{{ url("assunto/{$assunto['id']}") }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
