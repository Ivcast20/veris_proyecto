@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1 class="text-center">Categorías de Productos/Servicios</h1>
@stop

@section('content')
    @livewire('categories.show-categories')
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