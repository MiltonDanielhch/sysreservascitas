@extends('layouts.admin')

@section('header')
    <h1>Pago del paciente: {{ $pago->paciente->apellidos }} {{ $pago->paciente->nombres }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Datos Registrados</h3>
        </div>

        <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Paciente</label>
                            <p>{{ $pago->paciente->apellidos }} {{ $pago->paciente->nombres }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Doctores</label>
                            <P>{{ $pago->doctor->apellidos }} {{ $pago->doctor->nombres }}</P>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Fecha de pago</label>
                            <p>{{ $pago->fecha_pago }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Monto</label>
                            <p>{{ $pago->monto }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Descripción</label>
                            <p>{{ $pago->descripcion }}</p>
                        </div>
                    </div>
                </div>


                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/pagos') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>
@endsection
