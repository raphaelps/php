@extends('adminlte::page')

@section('title', 'Recarga')

@section('content_header')
    <h1>Valor a Recarregar</h1>

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
            @include('admin.includes.alerts')
            <form method="POST" action="{{route('deposit.store')}}">
            {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor recarga" class="form-control">
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-success">Recarregar</button>
                </div>
            </form>
        </div>
    </div>
@stop
