<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte </title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- <link rel="stylesheet" href="style.css" media="all" /> --}}
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        body {
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            font-family: 'Times New Roman', Times, serif;
        }

        header {
            padding: 20px 0px;
            margin-bottom: 30px;
        }

        #logo {
            margin: right;
        }

        #logo img {
            width: 200px;
        }

        h1 {
            color: #5D6975;
            font-size: 2.4em;
            font-weight: bolt;
            text-align: right;
            margin: 0 0 5px 0;

        }

        h2 {
            border-bottom: 1px solid #0087C3;
            color: #5D6975;
            font-size: 1.4em;
            line-height: 1em;
            font-weight: normal;
            text-align: right;
            margin: 0 0 5px 0;

        }

        #TotalR {
            text-align: right;
            font-weight: bold;
        }

        #datosR {
            float: left;
            font-weight: normal;
        }

        #datosR span {
            color: black;
            /* text-align: left; */
            width: 52px;
            /* margin-right: 5px; */
            /* display: inline-block; */
            /* font-size: 1em; */
            font-weight: bolder;
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #0087C3;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            /* color: #5D6975; */
            border-bottom: 1px solid #0087C3;
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            padding: 90px;
            text-align: right;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #0087C3;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="https://bn1305files.storage.live.com/y4mbW5izh9Iaulp4_z_buxFABEm1ZOPX9iWaYpp_km5aQUqcn1EikH-0igcEaYyMzZ-cYGfR2QoStz9eiVZf6iiDy0DyM7Z7YolaksJ-LMUz8SoKAXmqkr_Rh8GqVxfpNQJA1-IoFld_xLPP31kSX_HfNP3OBS9u7CDlvvg-U2G1YRkzR3cr_IEFySigEyBIYrW?width=595&height=283&cropmode=none"/>
        </div>
        <div>
            <h1>Módulo</h1>
            <h2>Usuarios</h2>
        </div>

        <div id="datosR">
            <div><span>Usuario:</span>{{ $nombreCompleto }}</div>
            <div><span>Fecha:</span>{{ $fecha }}</div>
            <div><span>Hora:</span> {{ $hora }}</div>
        </div>

        <div id="TotalR">
            <div><span>Total de registros: </span>{{ $usuarios->count() }}</div>
        </div>

    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th class="idUser">ID</th>
                    <th class="fecIni">Nombre</th>
                    <th class="fecFin">Apellido</th>
                    <th class="fecCreac">Creación</th>
                    <th class="UserEstado">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)   
                <tr>
                    <th class="idUser">{{ $usuario->id }}</th>
                    <th class="fecIni">{{ $usuario->name }}</th>
                    <th class="fecFin">{{ $usuario->lastname }}</th>
                    <th class="fecCreac">{{ $usuario->created_at }}</th>
                    <th class="UserEstado">{{ $usuario->deleted_at ? 'Inactivo' : 'Activo' }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <footer>
            Copyright&copy; 2022 Veris
        </footer>

</html>
