@extends('adminlte::page')
@section('title', 'Nueva Categoría')
@section('content_header')
    <h1 class="text-center">Nueva Categoría de Producto/Servicio</h1>
@stop
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nueva Categoría</li>
    </ol>
    <div class="card">
        <div class="card-body">
            {!! Form::model('category', ['route' => 'admin.categories.store', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::select('estado',[1 => 'Activo', 0 => 'Inactivo'], null, ['class' => 'form-control']) !!}
                @error('estado')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-2">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
@stop