@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1 class="text-center">Lista de Roles</h1>
@stop

@section('content')
   @livewire('show-roles')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop