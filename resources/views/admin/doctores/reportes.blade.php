@extends('layouts.admin')

@section('header')
    <h1>Reportes de Doctores</h1>
@endsection

@section('content')
<div class="col-md-4">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Generar Reportes</h3>
        </div>

        <div class="card-body">
            <a href="{{ url('/admin/doctores/pdf') }}" class="btn btn-success"><i class="bi bi-printer"></i> Listado del personal medico</a>
        </div>

    </div>
</div>
@endsection
