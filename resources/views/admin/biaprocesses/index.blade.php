@extends('adminlte::page')

@section('title', 'BIA Processes')

@section('content_header')
    <h1 class="text-center">Lista de BIA</h1>
@stop

@section('content')
    @livewire('show-bia-processes')
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