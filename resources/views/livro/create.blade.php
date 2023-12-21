@extends('layouts.default')

@section('title', 'Livros - Inserir')

@section('content')
    <div class="title-crud">
        <h2>Inserir Livros</h2>
    </div>
    <div class="row">
        <form action="{{url('livro')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="form-titulo">Título:</label>
                <input type="text" class="form-control" id="form-titulo" name="titulo">
            </div>
            <div class="form-group">
                <label for="form-editora">Editora:</label>
                <input type="text" class="form-control" id="form-editora" name="editora">
            </div>
            <div class="form-group">
                <label for="form-ano">Edição:</label>
                <input type="text" class="form-control" id="form-ano" name="edicao">
            </div>
            <div class="form-group">
                <label for="form-ano">Ano Publicação:</label>
                <input type="text" class="form-control" id="form-ano" name="ano_publicacao">
            </div>
            <div class="form-group">
                <label for="form-preco">Preço:</label>
                <input type="text" class="form-control" id="form-preco" name="preco">
            </div>
            <div class="form-group">
                <label for="form-autor">Autores:</label>
                <select multiple class="form-control" id="form-autor" name="autor[]">
                    @if (empty($autores) === false)
                        @foreach ($autores as $autor)
                            <option value="{{ $autor['id'] }}">{{ $autor['nome'] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="form-autor">Assuntos:</label>
                <select multiple class="form-control" id="form-autor" name="assunto[]">
                    @if (empty($assuntos) === false)
                        @foreach ($assuntos as $assunto)
                            <option value="{{ $assunto['id'] }}">{{ $assunto['descricao'] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
