<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clinica</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    @php
    $imagen = 'storage/'.$configuracion->logo;
    // dd($imagen);
    $imagenBase64 = "data:image/png;base64,". base64_encode(file_get_contents($imagen));
    @endphp
    <table border="0" style="font-size: 8pt">
        <tr>
            <td style="text-align: center">
                {{ $configuracion->nombre }} <br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->correo }} <br>
            </td>
            <td width="430px"></td>
            <td>
                {{-- <img src="{{ url('storage/'.$configuracion->logo) }}" alt="logo" width="100px"> --}}
                <img src="<?php echo $imagenBase64 ?>" alt="logo" width="80px">
            </td>
        </tr>
    </table>
    <h2 style="text-align:center"><u>Listado de todas las reservas medicas</u></h2>
    <br>

    <p>Reporte desde: {{ $fecha_inicio }} hasta {{ $fecha_fin }}</p>

    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table th {
            background-color: #e7e7e7;
        }
    </style>


    <table class="table">
        <thead>
            <tr style="background-color: #e7e7e7">
                <th>Nro</th>
                <th>Doctor</th>
                <th>Especialidad</th>
                <th>Fecha de reserva</th>
                <th>Hora de reserva</th>
            </tr>
        </thead>
        <tbody>
            @php
            $contador=1;
            @endphp
            @foreach ($eventos as $evento)
            <tr>
                <td>{{ $contador++ }}</td>
                <td>{{ $evento->doctor->nombres }} {{ $evento->doctor->apellidos }}</td>
                <td>{{ $evento->doctor->especialidad }}</td>
                <td>{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
