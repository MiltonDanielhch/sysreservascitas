@extends('layouts.admin')

@section('header')
    <h1>Consultoria: {{ $consultorio->nombre }}</h1>
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
                            <label for="">Nombre del Consultorio</label>
                           <p>{{ $consultorio->nombre }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Ubicacion</label>
                            <p>{{ $consultorio->ubicacion }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Capacidad</label>
                            <p>{{ $consultorio->capacidad }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Telefono</label>
                           <p>{{ $consultorio->telefono }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Especialidad</label>
                           <p>{{ $consultorio->especialidad }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Estado</label>
                            <p>{{ $consultorio->estado }}</p>
                        </div>
                    </div>

                </div>
                <br>

                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>
@endsection
