@extends('layouts.admin')

@section('header')
    <h1><b>Bienvenido</b> {{ Auth::user()->email }} / <b>rol</b>: {{ Auth::user()->roles->pluck('name')->first() }}</h1>
@endsection

@section('content')
<div class="row">
    @can('admin.usuarios.index')
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
    @endcan
    @can('admin.secretarias.index')
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
    @endcan

    @can('admin.pacientes.index')
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
    @endcan

    @can('admin.consultorios.index')
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
    @endcan

    @can('admin.doctores.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_doctores }}</h3>
                    <p>Doctores</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-person-lines-fill"></i>
                </div>
                <a href="{{ url('/admin/doctores') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan

    @can('admin.horarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $total_horarios }}</h3>
                    <p>Horarios</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-calendar2-week"></i>
                </div>
                <a href="{{ url('/admin/horarios') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan


</div>
@endsection
