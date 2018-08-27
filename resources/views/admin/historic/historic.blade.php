@extends('adminlte::page')

@section('title', 'Historico')

@section('content_header')
    <h1>Saldo</h1>
    <ol class="breadcrumb">
    <li><a href="{{route('admin.home')}}">Home</a></li>
        <li><a href="{{route('admin.balance')}}">Historico</a></li>

    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
        <a href="{{route('admin.balance')}}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
    </div>
        <div class="box-body">
                @include('admin.includes.alerts')
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                    <h3>R$ {{number_format($amount,'2',',','.')}}</h3>
                    </div>
                    <div class="icon">
                    <i class="ion ion-cash"></i>
                    </div>
                    <a href="#" class="small-box-footer">Historico <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
   </div>

@stop
