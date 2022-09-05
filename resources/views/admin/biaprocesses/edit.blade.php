@extends('adminlte::page')
@section('title', 'Editar BIA')
@section('content_header')
    <h1 class="text-center">Editar BIA</h1>
@stop
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.biaprocesses.index') }}">Lista de BIA</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar BIA</li>
    </ol>
    <div class="card">
        <div class="card-body">
            {!! Form::model($biaProcess, ['route' => ['admin.biaprocesses.update', $biaProcess->id], 'method' => 'PUT']) !!}
            {!! Form::hidden('id', null, []) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('alcance', 'Alcance') !!}
                {!! Form::textarea('alcance', null, ['class' => 'form-control']) !!}
                @error('alcance')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('fecha_inicio','Fecha de Inicio') !!}
                {!! Form::date('fecha_inicio', null, ['class' => 'form-control']) !!}
                @error('fecha_inicio')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('fecha_fin','Fecha de Fin') !!}
                {!! Form::date('fecha_fin', null, ['class' => 'form-control']) !!}
                @error('fecha_fin')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::select('estado', [1 => 'Activo', 0 => 'Inactivo'], null, ['class' => 'form-control']) !!}
                @error('estado')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-2">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.biaprocesses.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
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