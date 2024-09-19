@extends('layouts.admin')

@section('header', 'Listado de Consultorios')

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Consultorios Registrados</h3>
            <div class="card-tools">
                <a href="{{ url('admin/consultorios/create') }}" class="btn btn-primary">
                    Registrar Nuevo
                </a>
            </div>

        </div>

        <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Consultorio</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Capacidad</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $contador = 1;
                    @endphp
                    @foreach ($consultorios as $consultorio)
                    <tr>
                        <td>{{ $contador++ }}</td>
                        <td>{{ $consultorio->nombre }} </td>
                        <td>{{ $consultorio->ubicacion }}</td>
                        <td>{{ $consultorio->capacidad }}</td>
                        <td>{{ $consultorio->telefono }}</td>
                        <td>{{ $consultorio->especialidad }}</td>
                        <td>{{ $consultorio->estado }}</td>


                        <td style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Basic Simple">
                                <a href="{{ url('admin/consultorios/'.$consultorio->id) }}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                <a href="{{ url('admin/consultorios/'.$consultorio->id.'/edit') }}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                <a href="{{ url('admin/consultorios/'.$consultorio->id. '/confirm-delete') }}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <script>
                $(function () {
                    $("#example1").DataTable({
                        "pageLength": 10,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Consultorios",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Consultorios",
                            "infoFiltered": "(Filtrado de _MAX_ total Consultorios)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Consultorios",
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
