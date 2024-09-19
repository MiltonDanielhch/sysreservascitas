@extends('layouts.admin')

@section('header')
<h1>Doctor: {{ $doctor->nombres }} {{ $doctor->apellidos }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/doctores', $doctor->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label> <b>*</b>
                            <input type="text" value="{{ $doctor->nombres }}" name="nombres" class="form-control">
                            @error('nombres')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label> <b>*</b>
                            <input type="text" value="{{ $doctor->apellidos }}" name="apellidos" class="form-control">
                            @error('apellidos')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Telefono</label> <b>*</b>
                            <input type="number" value="{{ $doctor->telefono }}" name="telefono" class="form-control">
                            @error('telefono')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Licencia Medica</label> <b>*</b>
                            <input type="text" value="{{ $doctor->licencia_medica }}" name="licencia_medica" class="form-control">
                            @error('licencia_medica')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Especialidad</label> <b>*</b>
                            <input type="text" value="{{$doctor->especialidad }}" name="especialidad" class="form-control">
                            @error('especialidad')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Email</label><b>*</b>
                            <input type="email" value="{{ $doctor->user->email }}" name="email" class="form-control" required>
                        </div>
                         @error('password')
                             <small style="color: red">{{ $message }}</small>
                         @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Contraseña</label><b>*</b>
                            <input type="password" value="{{ old('password') }}" name="password" class="form-control" >
                        </div>
                         @error('password')
                             <small style="color: red">{{ $message }}</small>
                         @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Verificación Contraseña</label>
                            <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" >
                        </div>
                        @error('password_confirmation')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/doctores') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Actualizar Doctor </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
