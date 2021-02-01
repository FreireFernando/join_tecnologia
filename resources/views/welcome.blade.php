@extends('layouts.app')

@section('content')
<div class="text-center mt-3 mb-4 p-2">
    <h1>Página Inicial</h1>

    <p>CRUD criado afim de realizar cadastro de produtos e categoria de produtos que se relacionam.
    Utilizando Laravel 5.8 (pela estabilidade), pude explorar muitas features interessantes para tornar o projeto
    mais simples e completo.</p>
    <p>Info adicional: Para cadastrar um produto, a categoria do mesmo deverá ser cadastrada previamente.</p>
<br>
<div class="text-center mt-3 mb-4">
    <a href="{{url('categorias')}}">
        <button class="btn btn-success">Página de Categoria</button>
    </a>
    <a href="{{url('produtos')}}">
        <button class="btn btn-success">Página de Produto</button>
    </a>
</div>
<br>
<hr>
<br>
    <p>Fernando R. Freire</p>
</div>

@endsection