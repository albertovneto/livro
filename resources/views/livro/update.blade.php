@extends('layouts.default')

@section('title', 'Livros - Editar')

@section('content')

    <div class="title-crud">
        <h2>Editar Livro - {{ $livro['titulo'] ?? null }}</h2>
    </div>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <form action=" {{url("livro/{$livro['id']}") }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="form-titulo">Título:</label>
                <input type="text" class="form-control" id="form-titulo" name="titulo" value="{{ $livro['titulo'] }}">
            </div>
            <div class="form-group">
                <label for="form-editora">Editora:</label>
                <input type="text" class="form-control" id="form-editora" name="editora" value="{{ $livro['editora'] }}">
            </div>
            <div class="form-group">
                <label for="form-ano">Edição:</label>
                <input type="text" class="form-control" id="form-ano" name="edicao" value="{{ $livro['edicao'] }}">
            </div>
            <div class="form-group">
                <label for="form-ano">Ano Publicação:</label>
                <input type="text" class="form-control" id="form-ano" name="ano_publicacao" value="{{ $livro['ano_publicacao'] }}">
            </div>
            <div class="form-group">
                <label for="form-preco">Preço:</label>
                <input type="text" class="form-control" id="form-preco" name="preco" value="{{ @\App\format_currency($livro['preco']) }}">
            </div>
            <div class="form-group">
                <label for="form-autor">Autores:</label>
                <select multiple class="form-control" id="form-autor" name="autor[]">
                    @if (empty($autores) === false)
                        @foreach ($autores as $autor)
                            <option value="{{ $autor['id'] }}"
                                {{ @\App\return_selected_from_array($autor['id'], $livro['livro_autor'], 'id') }}
                            >
                                {{ $autor['nome'] }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="form-autor">Assuntos:</label>
                <select multiple class="form-control" id="form-autor" name="assunto[]">
                    @if (empty($assuntos) === false)
                        @foreach ($assuntos as $assunto)
                            <option value="{{ $assunto['id'] }}"
                                {{ @\App\return_selected_from_array($assunto['id'], $livro['livro_assunto'], 'id') }}
                            >
                                {{ $assunto['descricao'] }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary create">Submit</button>
            </div>
        </form>
    </div>
@endsection

