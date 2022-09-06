@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1 class="text-center">Lista de Usuarios</h1>
@stop

@section('content')
    <form method="post" action="resultado">
        @csrf
        <select name="usuarios[]" id="multipleselect" multiple class="form-control">
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" selected>{{ $usuario->lastname . ' ' . $usuario->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Click me</button>
    </form>
    {{ $usuarios }}
@stop

@section('css')
@stop

@section('js')
    <script>
        var demo1 = $('#multipleselect').bootstrapDualListbox();

        function mostrar() {
            alert(demo1);
        }
    </script>
@stop
