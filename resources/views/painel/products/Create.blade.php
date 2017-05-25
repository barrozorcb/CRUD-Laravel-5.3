@extends('painel.templates.Template')

@section('content')

    <h1 class="title-pg">Gestão de Produtos</h1>

    @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <form class="form" method="post" action="{{route('produtos.store')}}">

        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="name" placeholder="Nome" class="form-control" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="active" class="form-control">
                <input type="checkbox" name="active" value="1">
                Ativo?
            </label>
        </div>
        <div class="form-group">
            <input type="text" name="number" placeholder="Número" class="form-control" value="{{old('number')}}">
        </div>
        <div class="form-group">
            <select name="category" id="" class="form-control">
                <option>Escolha a categoria</option>
                @foreach($categories as $category)
                    <option value="{{$category}}">{{$category}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <textarea name="description" id="" cols="30" rows="10" placeholder="Descrição" class="form-control">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Enviar</button>
        </div>
    </form>

@endsection