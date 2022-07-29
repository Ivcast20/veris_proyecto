@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Nuevo Usuario</h1>
    </div>
@stop

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo Usuario</li>
    </ol>
    <div class="card">
        <div class="card-body">
            {!! Form::model('user', ['route' => ['admin.users.store'], 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('lastname', 'Apellido') !!}
                {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                @error('lastname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo Electrónico') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Contraseña') !!}
                {!! Form::text('password', null, ['class' => 'form-control']) !!}
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <h5>Listado de Roles</h5>
            @foreach ($roles as $rol)
                <div>
                    {!! Form::checkbox('roles[]', $rol->id) !!}
                    {!! Form::label($rol->name, $rol->name, ['class' => 'ml-1']) !!}
                </div>
            @endforeach
            @error('roles')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="pt-2">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
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
