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
    <h1 class="text-center">Cadastro de Produto</h1> <hr>
    <br>
    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="{{url('produtos')}}">
            @csrf

            <input class="form-control" type="text" name="nome_produto" id="nome_produto" placeholder="Nome do Produto:" required><br>
            <input class="form-control" type="number" step="0.01" name="valor_produto" id="valor_produto" placeholder="Valor do Produto:" required><br>
            <select class="form-control" name="id_categoria" id="id_categoria" required>
                <option value="">Selecione</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome_categoria}}</option>
                @endforeach
            </select><br>
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection