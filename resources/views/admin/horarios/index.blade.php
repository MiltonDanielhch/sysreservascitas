@extends('layouts.admin')

@section('header', 'Listado de Horarios')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Horarios Registrados</h3>
                <div class="card-tools">
                    <a href="{{ url('admin/horarios/create') }}" class="btn btn-primary">
                        Registrar Nuevo
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col">Consultorio</th>
                            <th scope="col">Dia de Atención</th>
                            <th scope="col">Hora Inicio</th>
                            <th scope="col">Hora Fin</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $contador = 1;
                        @endphp
                        @foreach ($horarios as $horario)
                        <tr>
                            <td>{{ $contador++ }}</td>
                            <td>{{ $horario->doctor->nombres }} {{ $horario->doctor->apellidos }}</td>
                            <td>{{ $horario->doctor->especialidad }}</td>
                            <td>{{ $horario->consultorio->nombre }} - {{ $horario->consultorio->ubicacion }}</td>
                            <td>{{ $horario->dia }}</td>
                            <td>{{ $horario->hora_inicio }}</td>
                            <td>{{ $horario->hora_fin }}</td>

                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic Simple">
                                    <a href="{{ url('admin/horarios/'.$horario->id) }}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                    <a href="{{ url('admin/horarios/'.$horario->id.'/edit') }}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ url('admin/horarios/'.$horario->id. '/confirm-delete') }}" type="button" class="btn btn-danger ntn-sm"><i class="bi bi-trash"></i></a>
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
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ horarios",
                                "infoEmpty": "Mostrando 0 a 0 de 0 horarios",
                                "infoFiltered": "(Filtrado de _MAX_ total horarios)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ horarios",
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
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-outline card-success">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-header">
                        <h3 class="card-title">Calendario de atención de doctores</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-header">
                        <div style="float: right">
                            <label for="">Consultorios</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-header">
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            @foreach ($consultorios as $consultorio)
                                <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <script>
                    $('#consultorio_select').on('change', function(){
                        var consultorio_id = $('#consultorio_select').val();
                        // alert(consultorio_id);
                        var url = "{{ route('admin.horarios.cargar_datos_consutorios', ':id') }}"
                        url = url.replace(':id', consultorio_id);

                        if(consultorio_id){
                            $.ajax({
                                url: url,
                                type: 'GET',
                                success: function (data){
                                    $('#consultorio_info').html(data);
                                },
                                error:function(){
                                    alert('error al obtener los datos del consultorio');
                                }
                            });
                        }else{
                            $('#consultorio_info').html('');
                        }
                    });
                </script>
                <hr>
                <div id="consultorio_info">

                </div>


            </div>

        </div>
    </div>
</div>
@endsection
