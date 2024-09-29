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
    <h2 style="text-align:center"><u>Listado del personal medico</u></h2>
    <br>

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
                <th>Apellido y nombres</th>
                <th>Teléfono</th>
                <th>Licencia Medica</th>
                <th>Especialidad</th>
            </tr>
        </thead>
        <tbody>
            @php
            $contador=1;
            @endphp
            @foreach ($doctores as $doctor)
            <tr>
                <td>{{ $contador++ }}</td>
                <td>{{ $doctor->apellidos }} {{ $doctor->nombre }}</td>
                <td>{{ $doctor->telefono }}</td>
                <td>{{ $doctor->licencia_medica }}</td>
                <td>{{ $doctor->especialidad }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
