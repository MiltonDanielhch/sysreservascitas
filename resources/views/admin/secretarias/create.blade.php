@extends('layouts.admin')

@section('header', 'Registro de una nueva Secretaria')

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/secretarias/create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label> <b>*</b>
                            <input type="text" value="{{ old('nombres') }}" name="nombres" class="form-control">
                            @error('nombres')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label> <b>*</b>
                            <input type="text" value="{{ old('apellidos') }}" name="apellidos" class="form-control">
                            @error('apellidos')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">CI</label> <b>*</b>
                            <input type="text" value="{{ old('ci') }}" name="ci" class="form-control">
                            @error('ci')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Celular</label> <b>*</b>
                            <input type="text" value="{{ old('celular') }}" name="celular" class="form-control">
                            @error('celular')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Fecha de Nacimiento</label> <b>*</b>
                            <input type="date" value="{{ old('fecha_nacimiento') }}" name="fecha_nacimiento" class="form-control">
                            @error('fecha_nacimiento')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form group">
                            <label for="">Dirección</label> <b>*</b>
                            <input type="address" value="{{ old('direccion') }}" name="direccion" class="form-control" required>
                        </div>
                        @error('direccion')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Email</label><b>*</b>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                         @error('password')
                             <small style="color: red">{{ $message }}</small>
                         @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Contraseña</label><b>*</b>
                            <input type="password" value="{{ old('password') }}" name="password" class="form-control" required>
                        </div>
                         @error('password')
                             <small style="color: red">{{ $message }}</small>
                         @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Verificación Contraseña</label>
                            <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" required>
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
                            <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar Nuevo</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
