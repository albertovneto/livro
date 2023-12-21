@extends('layouts.default')

@section('title', 'Assunto - Inserir')

@section('content')
    <div class="title-crud">
        <h2>Inserir Assunto</h2>
    </div>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <form action="{{url('assunto')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="form-descricao">Descrição:</label>
                <input type="text" class="form-control" id="form-descricao" name="descricao">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary create">Submit</button>
            </div>
        </form>
    </div>
@endsection
