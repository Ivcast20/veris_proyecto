@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1 class="text-center">Nuevo Rol</h1>
@stop

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo Rol</li>
    </ol>
    <div class="card">
        <div class="card-body">
            {!! Form::model('role', ['route' => ['admin.roles.store'], 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <h5>Listado de Permisos</h5>
            @foreach ($permissions as $permission)
                <div>
                    {!! Form::checkbox('permissions[]', $permission->id) !!}
                    {!! Form::label($permission->name, $permission->name, ['class' => 'ml-1']) !!}
                </div>
            @endforeach
            @error('permissions')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="pt-2">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
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
