{{-- @extends('adminlte::page')

@section('title', 'Criterios de Impacto')

@section('content_header')
    <h1 class="text-center">Lista de Criterios de Impacto</h1>
@stop

@section('content')
    <h1>Hola</h1>
    <img src="{{ asset('imgs.LOGO_VERIS.png') }}" class="img-fluid rounded-top" alt="">
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
@stop --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img src="imgs/LOGO_VERIS.png" class="img-fluid rounded-top" alt="">
</body>
</html>