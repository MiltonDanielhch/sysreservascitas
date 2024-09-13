@extends('layouts.admin')

@section('header')
    <h1>Secretaria: {{ $secretaria->nombres }} {{ $secretaria->apellidos }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Datos Registrados</h3>
        </div>

        <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label>
                            <p>{{ $secretaria->nombres }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label>
                            <p>{{ $secretaria->apellidos }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">CI</label>
                            <p>{{ $secretaria->ci }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Celular</label>
                           <p>{{ $secretaria->celular }}</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Fecha de Nacimiento</label>
                            <p>{{ $secretaria->fecha_nacimiento }}</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form group">
                            <label for="">Dirección</label> <b>*</b>
                           <p>{{ $secretaria->direccion }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">Email</label>
                            <p>{{ $secretaria->user->email }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>
@endsection
