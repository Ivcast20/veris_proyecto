@extends('adminlte::page')
@section('title', 'Editar Criterio')
@section('content_header')
    <h1 class="text-center">Editar Criterio</h1>
@stop
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.criterias.index') }}">Lista de Criterios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Criterio</li>
    </ol>
    <div class="card">
        <div class="card-body">
            {!! Form::model($criterio, ['route' => ['admin.criterias.update', $criterio], 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('criterio', 'Criterio') !!}
                {!! Form::textarea('criterio', null, ['class' => 'form-control']) !!}
                @error('criterio')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-2">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.criterias.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
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