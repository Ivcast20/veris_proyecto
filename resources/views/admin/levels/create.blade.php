@extends('adminlte::page')
@section('title', 'Nuevo Nivel de Calificación')
@section('content_header')
    <h1 class="text-center">Nuevo Nivel de Calificación</h1>
@stop
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.levels.index') }}">Niveles de Calificación</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo Nivel</li>
    </ol>
    <div class="card">
        <div class="card-body">
            {!! Form::model('level', ['route' => ['admin.levels.store'], 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('value', 'Valor') !!}
                {!! Form::number('value', null, ['class' => 'form-control']) !!}
                @error('value')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('active', 'Estado') !!}
                {!! Form::select('active', [1 => 'Activo', 0 => 'Inactivo'], null, ['class' => 'form-control']) !!}
                @error('active')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-2">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.levels.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
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
