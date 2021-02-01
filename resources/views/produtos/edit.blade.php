@extends('layouts.app')

@section('content')
<br>
    <h1 class="text-center">Cadastro de Produto</h1> <hr>
    <br>
    <div class="col-8 m-auto">
    <form name="formEdit" id="formEdit" method="post" action="{{url("produtos/$produto->id")}}">
            @csrf
            @method('PUT')

            <input class="form-control" type="text" name="nome_produto" id="nome_produto" value="{{$produto->nome_produto}}" placeholder="Nome do Produto:"><br>
            <input class="form-control" type="number" step="0.01" name="valor_produto" id="valor_produto" value="{{$produto->valor_produto}}" placeholder="Valor do Produto:"><br>
            <select class="form-control" name="id_categoria" id="id_categoria">
                <option value="{{$produto->relCategoria->id}}">{{$produto->relCategoria->nome_categoria}}</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome_categoria}}</option>
                @endforeach
            </select><br>
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection