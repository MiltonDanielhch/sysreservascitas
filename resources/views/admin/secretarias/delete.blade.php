@extends('layouts.admin')

@section('header')
    <h1>Eliminar Secretaria: {{ $secretaria->nombres }} {{ $secretaria->apellidos }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">¿estas seguro que quieres eliminar este registro?</h3>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/secretarias', $secretaria->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label>
                            <input type="text" value="{{ $secretaria->nombres }}" name="nombres" class="form-control" disabled>
                            @error('nombres')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label>
                            <input type="text" value="{{ $secretaria->apellidos }}" name="apellidos" class="form-control" disabled>
                            @error('apellidos')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">CI</label>
                            <input type="text" value="{{ $secretaria->ci }}" name="ci" class="form-control" disabled>
                            @error('ci')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Celular</label>
                            <input type="text" value="{{ $secretaria->celular }}" name="celular" class="form-control" disabled>
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
                            <label for="">Fecha de Nacimiento</label>
                            <input type="date" value="{{ $secretaria->fecha_nacimiento }}" name="fecha_nacimiento" class="form-control" disabled>
                            @error('fecha_nacimiento')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form group">
                            <label for="">Dirección</label>
                            <input type="address" value="{{ $secretaria->direccion }}" name="direccion" class="form-control" disabled>
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
                            <label for="">Email</label>
                            <input type="email" value="{{ $secretaria->user->email }}" name="email" class="form-control" disabled>
                        </div>
                         @error('password')
                             <small style="color: red">{{ $message }}</small>
                         @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Eliminar Nuevo</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
