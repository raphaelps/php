@extends('adminlte::page')

@section('title', 'Confimação da trasnferencia')

@section('content_header')
    <h1>Confimação da trasnferencia</h1>

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Home</a></li>
        <li><a href="{{route('admin.balance')}}">Saldo</a></li>
        <li><a href="{{ route('balance.transfer') }}">Transferir</a></li>
        <li><a href="">Confimação</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Confimação da trasnferencia do saldo</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <p><strong>Recebedor: </strong>{{ $sender->name }}</p>
            <p><strong>Saldo atual: </strong>{{ number_format($balance->amount,2,',','.') }}</p>

            <form method="POST" action="{{route('transfer.store')}}">
            {!! csrf_field() !!}

            <input type="hidden" name="sender_id" value="{{ $sender->id }}">

                <div class="form-group">

                    <input type="text" name="value" placeholder="Valor " class="form-control" autofocus>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-success">Trasnferir</button>
                </div>
            </form>
        </div>
    </div>
@stop
