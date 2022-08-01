@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Editar datos de usuario</h1>
    </div>
@stop

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Usuario</li>
    </ol>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre', []) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @error('name')
                    <small class="text-danger">* {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('lastname', 'Apellido', []) !!}
                {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                @error('lastname')
                    <small class="text-danger">* {{ $message }}</small>
                @enderror
                <div class="form-group">
                    {!! Form::label('email', 'Email', []) !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    @error('email')
                        <small class="text-danger">* {{ $message }}</small>
                    @enderror
                </div>
                <h5>Listado de Roles</h5>
                @foreach ($roles as $rol)
                    <div>
                        {!! Form::checkbox('roles[]', $rol->id, $user->roles->contains($rol->id) ? true : false) !!}
                        {!! Form::label($rol->name, $rol->name, ['class' => 'ml-1']) !!}
                    </div>
                @endforeach
                @error('roles')
                    <small class="text-danger">* {{ $message }}</small>
                @enderror
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        {{-- <div>{{ $user }}</div><br>
    <div>{{ $roles }}</div> --}}
    @stop

    @section('css')
    @stop

    @section('js')
    @stop
