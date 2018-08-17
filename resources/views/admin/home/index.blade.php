@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Controle de saldo de recargas</h1>
@stop

@section('content')
<p>Voce esta logado como <b>{!!auth()->user()->name!!}</b> !</p>
@stop
