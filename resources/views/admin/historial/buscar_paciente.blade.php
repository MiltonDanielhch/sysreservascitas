@extends('layouts.admin')

@section('header')
    <h1>Busqueda de Paciente: </h1>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Buscar al Paciente</h3>
        </div>

        <div class="card-body">
            <div class="card-body">
                <form action="{{ route('admin.historial.buscar_paciente') }}" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Carnet de Identidad: </label>
                                <input type="text" name="ci" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div style="height:32px"></div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                @if($paciente)
                <h3 >Informacion del Paciente</h3>
                    <div class="row">
                        <br>
                        <table>
                            <tr>
                                <td><b>Paciente: </b></td>
                                <td>{{ $paciente->apellidos }} {{ $paciente->nombres }}</td>
                            </tr>
                            <tr>
                                <td><b>Carnet de Identidad: </b></td>
                                <td>{{ $paciente->ci }}</td>
                            </tr>
                            <tr>
                                <td><b>Nro de Seguro</b></td>
                                <td>{{ $paciente->nro_seguro }}</td>
                            </tr>
                            <tr>
                                <td><b>Fecha de Nacimiento</b></td>
                                <td>{{ $paciente->fecha_nacimiento }}</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <a href="{{ url('/admin/historial/paciente',$paciente->id) }}" class="btn btn-warning">Imprimir historial medico del paciente</a>
                @else
                    <p>Paciente no registrado</p>
                @endif

            </div>
        </div>

    </div>
</div>
@endsection
