@extends('layouts.admin')

@section('header', 'Listado de Pagos')

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Pagos Registrados</h3>
            <div class="card-tools">
                <a href="{{ url('admin/pagos/create') }}" class="btn btn-primary">
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
                        <th scope="col">Doctor</th>
                        <th scope="col">Fecha de Pago</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $contador = 1;
                    @endphp
                    @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $contador++ }}</td>
                        <td>{{ $pago->paciente->apellidos }} {{ $pago->paciente->nombres }}</td>
                        <td>{{ $pago->doctor->apellidos }} {{ $pago->doctor->nombres }}</td>
                        <td>{{ $pago->fecha_pago }}</td>
                        <td>{{ $pago->monto }}</td>
                        <td>{{ $pago->descripcion }}</td>
                         <td style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Basic Simple">
                                <a href="{{ url('admin/pagos/'.$pago->id) }}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                <a href="{{ url('admin/pagos/pdf/'.$pago->id) }}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a>

                                <a href="{{ url('admin/pagos/'.$pago->id.'/edit') }}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                <a href="{{ url('admin/pagos/'.$pago->id. '/confirm-delete') }}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <p><h4>Resumen total del monto de pagos: {{ $total_monto }}</h4></p>
            <script>
                $(function () {
                    $("#example1").DataTable({
                        "pageLength": 10,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Pagos",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",
                            "infoFiltered": "(Filtrado de _MAX_ total Pagos)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Pagos",
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
                                text: '<button class="btn btn-danger btn-sm btn-block"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>',
                                extend: 'pdf'
                            },{
                                text: '<button class="btn btn-info btn-sm btn-block"><i class="bi bi-filetype-csv"></i> CSV</button>',
                                extend: 'csv'
                            },{
                                text: '<button class="btn btn-success btn-sm btn-block"><i class="bi bi-file-earmark-excel-fill"></i> EXCEL</button>',
                                extend: 'excel'
                            },{
                                text: '<button class="btn btn-warning btn-sm btn-block"><i class="bi bi-printer-fill"></i> IMPRIMIR</button>',
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
