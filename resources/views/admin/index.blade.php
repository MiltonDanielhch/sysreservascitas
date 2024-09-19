@extends('layouts.admin')

@section('header', 'Panel Principal')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total_usuarios }}</h3>
                <p>Usuarios</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-file-person-fill"></i>
            </div>
            <a href="{{ url('admin/usuarios') }}" class="small-box-footer">Mas Información <i class="fas bi-file-person-fill"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $total_secretarias }}</h3>
                <p>Secretarias</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-person-circle"></i>
            </div>
            <a href="{{ url('admin/secretarias') }}" class="small-box-footer">Mas Información <i class="fasbi bi-person-circle"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $total_pacientes }}</h3>
                <p>Pacientes</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-person-add"></i>
            </div>
            <a href="{{ url('admin/pacientes') }}" class="small-box-footer">Mas Información <i class="fas bi bi-person-add"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $total_consultorios }}</h3>
                <p>Consultorios</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-building-fill-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
@endsection
