@extends('layouts.default')

@section('title', 'Autor - Editar')

@section('content')
    <div class="title-crud">
        <h2>Editar Autor - {{ $autor['nome'] ?? null}}</h2>
    </div>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <form action=" {{url("autor/{$autor['id']}") }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="form-descricao">Nome:</label>
                <input type="text" class="form-control" id="form-autor" name="nome" value="{{ $autor['nome'] }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary create">Submit</button>
            </div>
        </form>
    </div>
@endsection

