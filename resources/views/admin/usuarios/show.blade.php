@extends('layouts.admin')

@section('header')
<h1>Usuario: {{ $usuario->name }}</h1>
@endsection

@section('content')
<div class="col-md-6">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Datos Registrados</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <label for="">Nombre del Usuario</label>
                        <p>{{ $usuario->name }}</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <label for="">Email</label>
                        <p>{{ $usuario->email }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
