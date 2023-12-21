@extends('layouts.default')

@section('title', 'Autor - Inserir')

@section('content')
    <div class="title-crud">
        <h2>Inserir Autor</h2>
    </div>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <form action="{{url('autor')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="form-nome">Nome:</label>
                <input type="text" class="form-control" id="form-nome" name="nome">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary create">Submit</button>
            </div>
        </form>
    </div>
@endsection
