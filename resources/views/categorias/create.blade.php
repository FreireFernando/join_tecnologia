@extends('layouts.app')

@section('content')

    @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors as $erro)
                {{$erro}}<br>
            @endforeach
        </div>
    @endif

<br>
    <h1 class="text-center">Cadastro de Categoria</h1> <hr>
    <br>
    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="{{url('categorias')}}">
            @csrf

            <input class="form-control" type="text" name="nome_categoria" id="nome_categoria" placeholder="Nome da Categoria:" required><br>
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection