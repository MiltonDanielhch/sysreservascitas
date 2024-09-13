@extends('layouts.admin')

@section('header')
<h1>Paciente {{ $paciente->nombres }} {{ $paciente->apellidos }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Datos Registrados</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Nombres</label>
                        <p>{{ $paciente->nombres }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Apellidos</label>
                        <P>{{ $paciente->apellidos }}</P>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">CI</label>
                       <p>{{ $paciente->ci }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Nro Seguro</label>
                       <p>{{ $paciente->nro_seguro }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Fecha de Nacimiento</label> <b>*</b>
                        <p>{{ $paciente->fecha_nacimiento }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Genero</label> <b>*</b>
                        <P>
                            @if($paciente->genero=='M')
                                MASCULINO
                            @else
                                FEMENINO
                            @endif
                        </P>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Celular</label> <b>*</b>
                        <p>{{ $paciente->celular }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Correo</label><b>*</b>
                        <p>{{ $paciente->correo }}</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9">
                    <div class="form group">
                        <label for="">Dirección</label> <b>*</b>
                        <p>{{ $paciente->direccion }}</p>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Grupo Sanguineo</label> <b>*</b>
                        <p>{{ $paciente->grupo_sanguineo }}</p>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">

                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Alergias</label>
                        <p>{{ $paciente->alergias }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form group">
                        <label for="">Contacto de Emergencia</label>
                        <p>{{ $paciente->contacto_emergencia }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form group">
                        <label for="">Observaciones</label>
                        <p>{{ $paciente->observaciones }}</p>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form group">
                        <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">volver</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
