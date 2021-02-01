@extends('layouts.app')

@section('content')

    <div class="text-center mt-4 mb-4 p-2">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}  
            </div><br>
        @endif
    </div>

    <h1 class="text-center">CRUD Join Tecnologia</h1> <hr>
    <br>
    <div class="text-center mt-3 mb-4">
        <a href="{{url('produtos/create')}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
        <a href="{{url('/')}}">
            <button class="btn btn-warning">Retornar a página inicial</button>
        </a>
    </div>
    <br>
    <div class="col-8 m-auto">
        <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>                
                <th scope="col">Nome</th>                
                <th scope="col">Valor</th>                
                <th scope="col">Nome da Categoria</th>
                <th scope="col">Data de Criação</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
            @php
                $categoria = $produto->find($produto->id)->relCategoria;
            @endphp
                <tr>
                    <th scope="row">{{$produto->id}}</th>
                    <td>{{$produto->nome_produto}}</td>
                    <td>R$ {{$produto->valor_produto}}</td>
                    <td>{{$categoria->nome_categoria}}</td>
                    <td>{{date_format($produto->created_at, 'd/m/y')}} </td>
                    <td>
                        <!-- <a href="{{url("produto/$produto->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a> -->
                        <a href="{{url("produtos/$produto->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        @csrf
                        @method('DELETE')
                        <a href="{{url("produtos/$produto->id")}}" class="js-del">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection