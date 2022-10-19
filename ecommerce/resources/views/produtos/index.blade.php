@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Produtos</h2>
        </div>
        <div class="pull-right">

            @can ('produtos-create')
                <a class="btn btn-success" href="{{ route('produtos.create') }}"> + Novo produtos</a>
            @endcan


        </div>
    </div>
</div>

<br>

@if ($message = Session::get('success'))

<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>

@endif

<table class="table table-bordered">

 <tr>
   <th>ID</th>
   <th>Nome</th>
   <th>Descricao</th>
   <th>Preco</th>
   <th width="280px">Ação</th>
 </tr>

 @foreach ($prod as $key => $produtos)

  <tr>
    <td>{{ $produtos->id }}</td>
    <td>{{ $produtos->nome }}</td>
    <td>{{ $produtos->descricao }}</td>
    <td>{{ $produtos->preco }}</td>
    <td>
        @can ('produtos-list')
            <a class="btn btn-info" href="{{ route('produtos.show',$produtos->id) }}">Mostrar</a>
        @endcan

        @can ('produtos-edit')
            <a class="btn btn-primary" href="{{ route('produtos.edit',$produtos->id) }}">Editar</a>
        @endcan

        @can ('produtos-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['produtos.destroy', $produtos->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}            
        @endcan

    </td>
  </tr>

 @endforeach

</table>

{!! $prod->render() !!}

@endsection
