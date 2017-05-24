@extends('painel.templates.Template')

@section('content')
    <h1 class="title-pg">Listagem de Produtos</h1>

    <a href="" class="btn btn-primary btn-add">
        <span class="glyphicon glyphicon-plus"></span> Cadastrar</a>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th width="100px">Ações</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <a href="" class="edit actions">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="" class="delete actions">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection