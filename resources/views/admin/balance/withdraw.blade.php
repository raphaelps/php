@extends('adminlte::page')

@section('title', 'Retiradas')

@section('content_header')
    <h1>Valor a retirada</h1>

    <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Home</a></li>
            <li><a href="{{route('admin.balance')}}">Saldo</a></li>
        <li><a href="">retirada</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Realizar retirada</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{route('withdraw.store')}}">
            {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor retirada" class="form-control">
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-success">Retirar</button>
                </div>
            </form>
        </div>
    </div>
@stop
