@extends('adminlte::page')
@section('title', 'Nuevo Producto/Servicio')
@section('content_header')
    <h1 class="text-center">Nuevo Producto/Servicio</h1>
@stop
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Lista de Productos/Servicios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo Producto/Servicio</li>
    </ol>
    <div class="card">
        <div class="card-body">
            {!! Form::model('ProductService', ['route' => ['admin.products.store'], 'method' => 'POST']) !!}
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
                {!! Form::label('category', 'Categoría') !!}
                <select class="form-control" name="category_id">
                    <option value="">-- Seleccione --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old("category_id") == $category->id ? "selected":"" }}>{{ $category->nombre }}</option>
                    @endforeach
                </select>
                @error('category_id')
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