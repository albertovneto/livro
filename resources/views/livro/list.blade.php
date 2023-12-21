@extends('layouts.default')

@section('title', 'Livros')

@section('content')
    <div class="title-crud">
        <h2>Livros</h2>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Editora</th>
                    <th scope="col">Edição</th>
                    <th scope="col">Ano de Publicação</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Autores</th>
                    <th scope="col">Assuntos</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
                </thead>
                <tbody>

                    @if (empty($livros) === false)
                        @foreach ($livros as $livro)
                            <tr>
                                <th scope="row">{{ $livro['id'] }}</th>
                                <td>{{ $livro['titulo'] }}</td>
                                <td>{{ $livro['editora'] }}</td>
                                <td>{{ $livro['edicao'] }}</td>
                                <td>{{ $livro['ano_publicacao'] }}</td>
                                <td>{{ $livro['preco'] }}</td>
                                <td>{{ @\App\implode_column_from_array($livro['livro_autor'], 'nome') }}</td>
                                <td>{{ @\App\implode_column_from_array($livro['livro_assunto'], 'descricao') }}</td>
                                <td><a href="{{ url("livro/{$livro['id']}/editar") }}">Editar</a></td>
                                <td>
                                    <form action="{{ url("livro/{{$livro['id']}") }}" method="post">
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
