@extends('layouts.app')

@section('content')
<br>
    <h1 class="text-center">Cadastro de Categoria</h1> <hr>
    <br>
    <div class="col-8 m-auto">
    <form name="formEdit" id="formEdit" method="post" action="{{url("categorias/$categoria->id")}}">
            @csrf
            @method('PUT')

            <input class="form-control" type="text" name="nome_categoria" id="nome_categoria" value="{{$categoria->nome_categoria}}" placeholder="Nome da Categoria:"><br>
            
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection