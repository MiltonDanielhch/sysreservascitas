@extends('layouts.admin')

@section('header')
    <h1>Consultoria: {{ $consultorio->nombre }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-danger    ">
        <div class="card-header">
            <h3 class="card-title">¿Estas seguro de eliminar este registro?</h3>
        </div>
        <form action="{{ url('/admin/consultorios', $consultorio->id) }}" method="POST">
            @csrf
            @method('DELETE')
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
                            <button type="submit" class="btn btn-danger">Eliminar consultorio</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
