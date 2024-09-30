@extends('layouts.admin')

@section('header', 'Listado de Historiales')

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Historiales Registrados</h3>
            <div class="card-tools">
                <a href="{{ url('admin/historial/create') }}" class="btn btn-primary">
                    Registrar Nuevo
                </a>
            </div>

        </div>

        <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Fecha de la cita medica</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $contador = 1;
                    @endphp
                    @foreach ($historiales as $historial)
                    @if(Auth::user()->hasRole('admin') || ($historial->doctor_id === Auth::user()->doctor->id))
                    {{-- @if($historial->doctor_id == Auth::user()->doctor->id) --}}
                        <tr>
                            <td>{{ $contador++ }}</td>
                            <td>{{ $historial->paciente->apellidos }}{{ $historial->paciente->nombres }} </td>
                            <td>{{ $historial->fecha_visita }}</td>
                            <td>{!! \Illuminate\Support\Str::limit($historial->detalle, 50, '...') !!}</td>

                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic Simple">
                                    <a href="{{ url('admin/historial/'.$historial->id) }}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                    <a href="{{ url('admin/historial/pdf/'.$historial->id) }}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a>
                                    <a href="{{ url('admin/historial/'.$historial->id.'/edit') }}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ url('admin/historial/'.$historial->id. '/confirm-delete') }}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <script>
                $(function () {
                    $("#example1").DataTable({
                        "pageLength": 10,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ historiales",
                            "infoEmpty": "Mostrando 0 a 0 de 0 historiales",
                            "infoFiltered": "(Filtrado de _MAX_ total historiales)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ historiales",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscador:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        },
                        "responsive": true, "lengthChange": true, "autoWidth": false,
                        buttons: [{
                            extend: 'collection',
                            text: 'Reportes',
                            orientation: 'landscape',
                            buttons: [{
                                text: 'Copiar',
                                extend: 'copy',
                            }, {
                                extend: 'pdf'
                            },{
                                extend: 'csv'
                            },{
                                extend: 'excel'
                            },{
                                text: 'Imprimir',
                                extend: 'print'
                            }
                            ]
                        },
                            {
                                extend: 'colvis',
                                text: 'Visor de columnas',
                                collectionLayout: 'fixed three-column'
                            }
                        ],
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                });
            </script>
        </div>

    </div>

</div>

@endsection
