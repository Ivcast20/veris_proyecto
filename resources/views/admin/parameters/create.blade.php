@extends('adminlte::page')
@section('title', 'Nuevo Parámetro')
@section('content_header')
    <h1 class="text-center">Nuevo Parámetro</h1>
@stop
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.parameters.index') }}">Lista de Parámetros</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo Parámetro</li>
    </ol>
    {{-- @livewire('parameters.create-parameter') --}}
    <div class="card">
        <div class="card-body">
            {!! Form::model('parameter', ['route' => ['admin.parameters.store'], 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre del parámetro']) !!}
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('proceso_bia', 'Proceso BIA') !!}
                <select class="form-control" name="bia_process_id">
                    <option value="">-- Seleccione --</option>
                    @foreach ($procesos_bia as $proceso)
                        <option value="{{ $proceso->id }}" {{ old("bia_process_id") == $proceso->id ? "selected":"" }}>{{ $proceso->nombre }}</option>
                    @endforeach
                </select>
                @error('bia_process_id')
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
                    <a href="{{ route('admin.parameters.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
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
