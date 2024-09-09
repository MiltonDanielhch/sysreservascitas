@extends('layouts.admin')

@section('header', 'Registro de un nuevo Usuario')

@section('content')
<div class="col-md-6">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.usuarios.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Nombre del Usuario</label> <b>*</b>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                            @error('name')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Email</label> <b>*</b>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control" required>
                        </div>
                        @error('email')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Contraseña</label><b>*</b>
                            <input type="password" value="{{ old('password') }}" name="password" class="form-control" required>
                        </div>
                         @error('password')
                             <small style="color: red">{{ $message }}</small>
                         @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
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
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
