@extends('adminlte::page')

@section('title', 'Transferencias')

@section('content_header')
    <h1>Valor a transferir</h1>

    <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Home</a></li>
            <li><a href="{{route('admin.balance')}}">Saldo</a></li>
        <li><a href="">Transferir</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Transferir Saldo (Inform o Recebedor)</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{route('confirm.transfer')}}">
            {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="sender" placeholder="informação de quem vai receber o valor (Nome ou E-mail)" class="form-control" autofocus>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-success">Proxima etapa</button>
                </div>
            </form>
        </div>
    </div>
@stop
