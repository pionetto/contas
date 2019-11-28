@extends('principal')
@section('title', 'Listagem de Contas')
@section('content')

<script type="text/javascript">
    function apagar(url) {
        if (window.confirm('Deseja realmente apagar?')){
            window.location = url;
        }

    }
</script>

<h3>Lista de Contas Pagar</h3>

@if(old('insert'))
    <div class="alert alert-success">
        <strong>Sucesso</strong>
            {{ old('descricao')}} cadastrado!
    </div>
@endif

@if(old('update'))
    <div class="alert alert-success">
        <strong>Sucesso</strong>
            {{ old('descricao')}} alterado!
    </div>
@endif

<table width="100%" class="table table-striped table-bordered table-hover">
    <tr>
        <td>ID</td>
        <td>DESCRIÇÃO</td>
        <td>VALOR</td>
        <td>EDITAR</td>
        <td>APAGAR</td>
    </tr>
@foreach ($contas_pagar as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->descricao }}</td>
        <td>{{ $c->valor }}</td>
        <td><a class="btn btn-small btn-info" href="{{ action("ContasPagarController@editar", $c->id) }}">Editar</a></td>
        <td><a class="btn btn-small btn-danger" href="#" onclick="apagar('{{ action("ContasPagarController@apagar", $c->id) }}');">Apagar</a></td>
    </tr>
@endforeach
</table>

<td><a class="btn btn-small btn-info" href="{{ action("ContasPagarController@cadastro") }}">Cadastro</a></td>

@stop