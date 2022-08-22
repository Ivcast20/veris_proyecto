@extends('adminlte::page')
@section('title', 'Editar Nivel')
@section('content_header')
    <h1 class="text-center">Editar Nivel de Calificación</h1>
@stop
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.levels.index') }}">Niveles de Calificación</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo Nivel</li>
    </ol>
    <div class="card">
        <div class="card-body">
            {!! Form::model($level, ['route' => ['admin.levels.update', $level], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::number('valor', null, ['class' => 'form-control']) !!}
                @error('valor')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::select('estado', [1 => 'Activo', 0 => 'Inactivo'], $level->active, ['class' => 'form-control']) !!}
                @error('active')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <input type="hidden" name="bia_process_id" value="{{ $level->bia_process_id }}">
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
