@extends('layouts.admin')

@section('header')
<h1>Reportes de reservas de citas medicas</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Generar Reportes</h3>
            </div>

            <div class="card-body">
                <a href="{{ url('/admin/reservas/pdf') }}" class="btn btn-success"><i class="bi bi-printer"></i> Listado
                    de todas las reservas</a>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Generar Reporte por fecha</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.reservas.pdf_fechas') }}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Fecha Inicio: </label>
                            <input type="date" name="fecha_inicio" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Fecha fin: </label>
                            <input type="date" name="fecha_fin" class="form-control">
                        </div>
                        <div class="col-md-4" style="display: flex; align-items:flex-end;">
                            <button class="btn btn-success" type="submit">
                                <i class="bi bi-printer"></i> Generar reporte
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
