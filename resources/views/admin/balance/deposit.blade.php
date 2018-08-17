@extends('adminlte::page')

@section('title', 'Depositos')

@section('content_header')
    <h1>Valor a depositar</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Recarga</a></li>

    </ol>
@stop

@section('content')
    <div class="box">
            <div class="box-header">
            <h3>Realizar Recargas</h3>
            </div>
            <div class="box-body">
            <form method="POST" action="{{route('deposit.store')}}">
                    <div class="form-group">
                        <input type="text" placeholder="Valor recarga" class="form-control">
                    </div>
                    <div class="form-group">
                           <button type="submit" class="btn btn-success">Recarregar</button>
                    </div>
                </form>
            </div>
    </div>
@stop
