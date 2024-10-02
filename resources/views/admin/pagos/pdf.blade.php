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
    <h2 style="text-align:center"><u>Comprobante de Pago - Original</u></h2>
    <br>


    <table border="0" cellpadding="5px" cellpacing="5px">
        <tr>
            <td width="120px"><b>Sr(es): </b></td>
            <td>{{ $pago->paciente->apellidos }} {{ $pago->paciente->nombres }}</td>
            <td width="180px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64, {{ $qrCodeBase64 }}" alt="Codigo Qr" width="150px">
                </div>
            </td>
        </tr>
        <tr>
            <td><b>Fecha: </b></td>
            <td>{{ $pago->fecha_pago }}</td>
        </tr>
        <tr>
            <td><b>Consultorio: </b></td>
            <td>{{ $pago->doctor->especialidad }}</td>
        </tr>
        <tr>
            <td><b>Monto: </b></td>
            <td>{{ $pago->monto }}</td>
        </tr>
    </table>
    <br><br>
    <table border="0" style="font-size: 9pt">
        <tr>
            <td width="210px">
                <p style="text-align: center">____________________</br>
                    <b>Secretaria</b> <br>
                    {{ Auth::user()->secretarias->apellidos }} {{ Auth::user()->secretarias->nombres }}
                </p>
            </td>
            <td width="210px"></td>
            <td width="210px">
                <p style="text-align:center">____________________</br>
                    <b>Recibi conforme <br></b>
                </p>
            </td>
        </tr>
    </table>

    <p>---------------------------------------------------------------------------------------------------------------------------
    </p>

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
    <h2 style="text-align:center"><u>Comprobante de Pago - Copia</u></h2>
    <br>

    <table border="0" cellpadding="5px" cellpacing="5px">
        <tr>
            <td width="120px"><b>Sr(es): </b></td>
            <td>{{ $pago->paciente->apellidos }} {{ $pago->paciente->nombres }}</td>
            <td width="180px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64, {{ $qrCodeBase64 }}" alt="Codigo Qr" width="150px">
                </div>
            </td>
        </tr>
        <tr>
            <td><b>Fecha: </b></td>
            <td>{{ $pago->fecha_pago }}</td>
        </tr>
        <tr>
            <td><b>Consultorio: </b></td>
            <td>{{ $pago->doctor->especialidad }}</td>
        </tr>
        <tr>
            <td><b>Monto: </b></td>
            <td>{{ $pago->monto }}</td>
        </tr>
    </table>
    <br><br>
    <table border="0" style="font-size: 9pt">
        <tr>
            <td width="210px">
                <p style="text-align: center">____________________</br>
                    <b>Secretaria</b> <br>
                    {{ Auth::user()->secretarias->apellidos }} {{ Auth::user()->secretarias->nombres }}
                </p>
            </td>
            <td width="210px"></td>
            <td width="210px">
                <p style="text-align:center">____________________</br>
                    <b>Recibi conforme <br></b>
                </p>
            </td>
        </tr>
    </table>

</body>

</html>
