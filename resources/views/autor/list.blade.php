@extends('layouts.default')

@section('title', 'Autores')

@section('content')
    <div class="title-crud row">
        <div class="col-9">
            <h2>Autores</h2>
        </div>
        <div class="col-3">
            <a href="{{ url("autor/criar") }}">
                <div class="btn list-create">Novo Autor</div>
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
                    <th scope="col">Nome</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
                </thead>
                <tbody>
                @if (empty($autores) === false)
                    @foreach ($autores as $autor)
                        <tr>
                            <th scope="row">{{ $autor['id'] }}</th>
                            <td>{{ $autor['nome'] ?? null}}</td>
                            <td><a href="{{ url("autor/{$autor['id']}/editar") }}">Editar</a></td>
                            <td>
                                <form action="{{ url("autor/{$autor['id']}") }}" method="post">
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
