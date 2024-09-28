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
            <a href="{{ url('admin/usuarios') }}" class="small-box-footer">Mas Información <i
                    class="fas bi-file-person-fill"></i></a>
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
            <a href="{{ url('admin/secretarias') }}" class="small-box-footer">Mas Información <i
                    class="fasbi bi-person-circle"></i></a>
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
            <a href="{{ url('admin/pacientes') }}" class="small-box-footer">Mas Información <i
                    class="fas bi bi-person-add"></i></a>
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
            <a href="{{ url('/admin/doctores') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
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
            <a href="{{ url('/admin/horarios') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @endcan

    @can('admin.horarios.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total_eventos }}</h3>
                <p>Reserva</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-calendar2-check"></i>
            </div>
            <a href="{{ url('/admin/horarios') }}" class="small-box-footer"><i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @endcan

    @can('admin.horarios.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $total_configuraciones }}</h3>
                <p>Configuraciones</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-gear"></i>
            </div>
            <a href="{{ url('/admin/configuraciones') }}" class="small-box-footer">Mas Informacion<i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @endcan


    @can('cargar_datos_consultorios')
    <div class="container">
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
                                    <option value="">Seleccione un consultorio...</option>
                                    @foreach ($consultorios as $consultorio)
                                    <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }} - {{
                                        $consultorio->ubicacion }}</option>
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
                                // var url = "{{ route('cargar_datos_consultorios', ':id') }}"
                                // url = url.replace(':id', consultorio_id);
                                // alert(url);
                                if(consultorio_id){
                                    $.ajax({
                                        url: "{{ url('/consultorios/') }}" + '/' + consultorio_id,
                                        // url: url,
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
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-outline card-warning">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-header">
                                <h3 class="card-title">Calendario de Reserva de citas</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-header">
                                <div style="float: right">
                                    <label for="">Doctores</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-header">
                                <select name="doctor_id" id="doctor_select" class="form-control">
                                    <option value="">Seleccione su doctor...</option>
                                    @foreach ($doctores as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->nombres }} - {{
                                        $doctor->apellidos }} - {{ $doctor->especialidad }}</option>
                                    @endforeach
                                    <script>
                                        $('#doctor_select').on('change', function(){
                                            var doctor_id = $('#doctor_select').val();
                                            // alert(doctor_id);

                                            var calendarEl = document.getElementById('calendar');
                                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                                initialView: 'dayGridMonth',
                                                locale: 'es',
                                                events: [
                                                ],
                                            });

                                            if(doctor_id){
                                                $.ajax({
                                                    url: "{{ url('/cargar_reserva_doctores/') }}" + '/' + doctor_id,
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    success: function (data){
                                                        calendar.addEventSource(data);
                                                    },
                                                    error: function(){
                                                        alert('Error al obtener los datos del doctor');
                                                    }
                                                });
                                            }else{
                                                $('#doctor_info').html('');
                                            }

                                            calendar.render();
                                        });
                                    </script>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Registrar cita Medica
                            </button>
                            <a href="{{ url('/admin/ver_reservas', Auth::user()->id) }}" class="btn btn-success" ><i class="bi bi-calendar2-check"></i>  Ver las reservas</a>

                            <form action="/admin/eventos/create" method="post">
                                @csrf
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Recerva de cita medicas
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Doctor</label>
                                                            <select name="doctor_id" id="" class="form-control">
                                                                @foreach ($doctores as $doctor)
                                                                <option value="{{ $doctor->id }}">{{ $doctor->nombres }}
                                                                    {{ $doctor->apellidos }} - {{ $doctor->especialidad
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Fecha de reserva</label>
                                                            <input type="date" id="fecha_reserva"
                                                                value="@php echo date('Y-m-d'); @endphp"
                                                                name="fecha_reserva" class="form-control">
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function(){
                                                                    const fechaReservaInput = document.getElementById('fecha_reserva');

                                                                    //Escuchar el evento de cambio en el campo de fecha de reserva
                                                                    fechaReservaInput.addEventListener('change', function(){
                                                                        let selectedDate = this.value; //obtener la fecha seleccionada

                                                                        //obtener la fecha actual en formato ISO (yyyy-mm--dd)
                                                                        let today = new Date().toISOString().slice(0,10);

                                                                        //verificar si la fecha seleccionada es anterior a la fecha actual
                                                                        if(selectedDate < today){
                                                                            //si es asi, establecer la fecha seleccionado en null
                                                                            this.value = null;
                                                                            alert('No se puede reservar en una fecha pasada');
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Hora de reserva</label>
                                                            <input type="time" name="hora_reserva" value="hora_reserva"
                                                                class="form-control">
                                                            @error('hora_reserva')
                                                            <small>{{ $message }}</small>
                                                            @enderror
                                                            @if( (($message = Session::get('hora_reserva'))) )
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function(){
                                                                        $('#exampleModal').modal('show');
                                                                    });
                                                            </script>
                                                            <small>{{ $message }}</small>
                                                            @endif
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function(){
                                                                    const horaReservaInput = document.getElementById('hora_reserva');

                                                                    horaReservaInput.addEventListener('change', function(){
                                                                        let selectedTime = this.value; //obtener el valor de la hora seleccionada

                                                                        //asegurar que solo se capture la parte de la hora
                                                                        if(selectedTime){
                                                                            selectedTime = selectedTime.slice(':'); //Dividir la cadena en horas y minutos
                                                                            selectedTime = selectedTime[0]+':00';//conservar solo la hora, ignorar los minutos
                                                                            this.value = selectedTime; //establecer la hora modificada en el campo de entrada
                                                                        }
                                                                        //verificar si la hora seleccionada esta fuera del rango permitido
                                                                        if (selectedTime < '08:00' || selectedTime > '20:00'){
                                                                            //si es asi, establecer la hora seleccionada en null
                                                                            this.value = null;
                                                                            alert('por favor, seleccione una hora entre las 08:00 y las 20:00');
                                                                        }

                                                                    })
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">cerrar</button>
                                                <button type="submit" class="btn btn-primary">Registrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id='calendar'></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endcan


    @if(Auth::check() && Auth::user()->doctor)
        {{-- <h1>si esta autenticado y tiene relacionn con el doctor</h1> --}}
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-outline card-success">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-header">
                                    <h3 class="card-title">Calendario de Reserva</h3>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            {{-- <h1>{{ Auth::user()->doctor->id }}</h1> --}}
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Fecha de reserva</th>
                                        <th scope="col">Hora de reserva</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $contador = 1;
                                    @endphp
                                    {{-- @foreach ($eventos as $evento) --}}
                                    @foreach (collect($eventos)->where('doctor_id', Auth::user()->doctor->id)->all() as $evento)
                                        @if(Auth::user()->doctor->id == $evento->doctor_id)
                                            <tr>
                                                <td>{{ $contador++ }}</td>
                                                <td>{{ $evento->user->name }} </td>
                                                <td>{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}</td>
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
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                                            "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Reservas",
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
        </div>

    @endif

</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        events: [
            @foreach ($eventos as $evento)
                {
                    title: '{{ $evento->title }}',
                    start: '{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}',
                    end: '{{ \Carbon\Carbon::parse($evento->end)->format('Y-m-d') }}',
                    color: '#82216'
                },
            @endforeach
        ]
      });
      calendar.render();
    });

</script> --}}
@endsection
