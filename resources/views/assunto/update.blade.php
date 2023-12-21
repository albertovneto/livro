@extends('layouts.default')

@section('title', 'Assunto - Editar')

@section('content')
    <div class="title-crud">
        <h2>Editar Assunto - {{ $assunto['descricao'] ?? null}}</h2>
    </div>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <form action=" {{url("assunto/{$assunto['id']}") }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="form-descricao">Descrição:</label>
                <input type="text" class="form-control" id="form-descricao" name="descricao" value="{{ $assunto['descricao'] }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary create">Submit</button>
            </div>
        </form>
    </div>
@endsection

