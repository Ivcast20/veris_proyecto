@extends('adminlte::page')
@section('title', 'Nuevo Criterio')
@section('content_header')
    <h1 class="text-center">Nuevo Criterio</h1>
@stop
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.criterias.index') }}">Lista de Criterios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo Criterio</li>
    </ol>
    @livewire('criterias.create-criteria')
@stop
@section('css')
@stop
@section('js')
@stop
