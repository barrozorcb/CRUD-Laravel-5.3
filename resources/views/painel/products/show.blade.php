@extends('painel.templates.Template')

@section('content')
    <h1 class="title-pg">Produto : <b>{{$produto->name}}</b> </h1>
    <p><b>Ativo: </b>@if( $produto->active == 1 ) Sim @else Não @endif</p>
    <p><b>Número: </b>{{$produto->number}}</p>
    <p><b>Categoria: </b>{{$produto->category}}</p>
    <p><b>Descrição: </b>{{$produto->description}}</p>

    <hr>

    @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => ['produtos.destroy', $produto->id], 'method' => 'DELETE']) !!}
        {!! Form::submit("Deletar Produto: $produto->name", ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection