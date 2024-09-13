@extends('layouts.admin')

@section('header')
    <h1>Modificar Paciente: {{ $paciente->nombres }} {{ $paciente->apellidos }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/pacientes', $paciente->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label> <b>*</b>
                            <input type="text" value="{{ $paciente->nombres }}" name="nombres" class="form-control">
                            @error('nombres')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label> <b>*</b>
                            <input type="text" value="{{ $paciente->apellidos }}" name="apellidos" class="form-control">
                            @error('apellidos')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">CI</label> <b>*</b>
                            <input type="text" value="{{ $paciente->ci }}" name="ci" class="form-control">
                            @error('ci')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nro Seguro</label> <b>*</b>
                            <input type="text" value="{{ $paciente->nro_seguro }}" name="nro_seguro" class="form-control">
                            @error('ci')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Fecha de Nacimiento</label> <b>*</b>
                            <input type="date" value="{{ $paciente->fecha_nacimiento }}" name="fecha_nacimiento" class="form-control">
                            @error('fecha_nacimiento')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Genero</label> <b>*</b>
                            <select name="genero" id="" class="form-control">
                               @if($paciente->genero=='M')
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMENINO</option>
                               @else
                                    <option value="F">FEMENINO</option>
                                    <option value="M">MASCULINO</option>
                               @endif

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Celular</label> <b>*</b>
                            <input type="text" value="{{ $paciente->celular }}" name="celular" class="form-control">
                            @error('celular')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Correo</label><b>*</b>
                            <input type="email" value="{{ $paciente->correo }}" name="correo" class="form-control" required>
                        </div>
                         @error('correo')
                             <small style="color: red">{{ $message }}</small>
                         @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form group">
                            <label for="">Dirección</label> <b>*</b>
                            <input type="address" value="{{ $paciente->direccion }}" name="direccion" class="form-control" required>
                        </div>
                        @error('direccion')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Grupo Sanguineo</label> <b>*</b>
                            <select name="grupo_sanguineo" id="" class="form-control">
                                <option value="A+" @selected($paciente->grupo_sanguineo == 'A+')>A+</option>
                                <option value="A-" @selected($paciente->grupo_sanguineo == 'A-')>A-</option>
                                <option value="B+" @selected($paciente->grupo_sanguineo == 'B+')>B+</option>
                                <option value="B-" @selected($paciente->grupo_sanguineo == 'B-')>B-</option>
                                <option value="O+" @selected($paciente->grupo_sanguineo == 'O+')>O+</option>
                                <option value="O-" @selected($paciente->grupo_sanguineo == 'O-')>O-</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Alergias</label><b>*</b>
                            <input type="text" value="{{ $paciente->alergias }}" name="alergias" class="form-control" required>
                        </div>
                         @error('alergias')
                             <small style="color: red">{{ $message }}</small>
                         @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Contacto de Emergencia</label>
                            <input type="text" value="{{ $paciente->contacto_emergencia }}" name="contacto_emergencia" class="form-control" required>
                        </div>
                        @error('contacto_emergencia')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Observaciones</label>
                            <input type="tex" value="{{ $paciente->observaciones }}" name="observaciones" class="form-control" required>
                        </div>
                        @error('observaciones')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Actualizar Paciente</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
