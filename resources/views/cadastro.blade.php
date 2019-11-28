@extends('principal')
@section('title', 'Cadastrar Conta')
@section('content')

<h3>Cadastro de Contas</h3>
{{ count($errors) }}
<form action="{{action("ContasPagarController@salvar") }}" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type="hidden" name="insert" value="insert">
    <div class="form-group">
        <label>Descrição:</label>
        <input type="text" name="descricao" class="form-control">
    </div>
    <div class="form-group">
            <label>Valor:</label>
            <input type="text" name="valor" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@stop