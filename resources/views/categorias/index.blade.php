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
        <a href="{{url('categorias/create')}}">
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
                <th scope="col">Nome da Categoria</th>
                <th scope="col">Data de Criação</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <th scope="row">{{$categoria->id}}</th>
                    <td>{{$categoria->nome_categoria}}</td>
                    <td>{{date_format($categoria->created_at, 'd/m/y')}} </td>
                    <td>
                        <a href="{{url("categorias/$categoria->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        @csrf
                        @method('DELETE')
                        <a href="{{url("categorias/$categoria->id")}}" class="js-delc">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection