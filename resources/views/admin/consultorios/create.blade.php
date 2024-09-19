@extends('layouts.admin')

@section('header', 'Registro de un nuevo Consultorio')

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/consultorios/create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombre del Consultorio</label> <b>*</b>
                            <input type="text" value="{{ old('nombre') }}" name="nombre" class="form-control">
                            @error('nombre')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Ubicacion</label> <b>*</b>
                            <input type="text" value="{{ old('ubicacion') }}" name="ubicacion" class="form-control">
                            @error('ubicacion')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Capacidad</label> <b>*</b>
                            <input type="text" value="{{ old('capacidad') }}" name="capacidad" class="form-control">
                            @error('capacidad')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Telefono</label> <b>*</b>
                            <input type="text" value="{{ old('telefono') }}" name="telefono" class="form-control">
                            @error('telefono')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Especialidad</label> <b>*</b>
                            <input type="text" value="{{ old('especialidad') }}" name="especialidad" class="form-control">
                            @error('especialidad')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Estado</label> <b>*</b>
                            <select name="estado" id="" class="form-control">
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                </div>
                <br>

                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar Consultorio</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
