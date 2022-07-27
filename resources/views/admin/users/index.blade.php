@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1 class="text-center">Lista de Usuarios</h1>
@stop

@section('content')
    @livewire('show-users')
@stop

@section('css')
@stop

@section('js')
<script>
    let mensaje = '{{ Session::has('message') }}';
    if (mensaje) {
        Swal.fire({
            title: '{{ Session::get('message') }}',
            toast: true,
            icon: 'success',
            position: 'top-end',
            timer: 3000,
            showConfirmButton: false,
        });
    }
</script>
@stop
