@extends('layouts.admin')

@section('header')
    <h1>Paciente: {{ $historial->paciente->apellidos }} {{ $historial->paciente->nombres }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Paciente</label> <b>*</b>
                                    <p>{{ $historial->paciente->apellidos }} {{ $historial->paciente->nombres }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de la cita medica</label> <b>*</b>
                                   <p>{{ $historial->fecha_visita }}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Descripcion de la Cita</label> <b>*</b>
                                    <p>{!! $historial->detalle !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/historial') }}" class="btn btn-secondary">Volver</a>

                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>
@endsection
