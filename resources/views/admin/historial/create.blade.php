@extends('layouts.admin')

@section('header', 'Registro de nuevo historial')

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/historial/create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Paciente</label> <b>*</b>
                                    <select name="paciente_id" id="" class="form-control">
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}">{{ $paciente->apellidos }} {{ $paciente->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="search">Buscar paciente:</label>
                                    <input type="text" name="search" id="search" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Paciente</label> <b>*</b>
                                    <select name="paciente_id" id="paciente_select" class="form-control">
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}">{{ $paciente->apellidos }}, {{ $paciente->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>  

                            </div>

                            <script>
                                document.getElementById('search').addEventListener('input', function() {
                                    const searchInput = this.value.toLowerCase();
                                    const select = document.getElementById('paciente_select');
                                    const options = select.options;

                                    for (let i = 0; i < options.length; i++) {
                                        const option = options[i];
                                        const text = option.text.toLowerCase();
                                        if (text.indexOf(searchInput) > -1) {
                                            option.style.display = 'block';
                                        } else {
                                            option.style.display = 'none';
                                        }
                                    }
                                });
                            </script>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de la cita medica</label> <b>*</b>
                                    <input type="date"  value="@php echo date('Y-m-d') @endphp" name="fecha_visita" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Descripcion de la Cita</label> <b>*</b>
                                    <textarea name="detalle" id="editor" class="form-control" cols="30" rows="10" style="width: 100%"></textarea>
                                    <script type="importmap">
                                        {
                                            "imports": {
                                                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.js",
                                                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.1.1/"
                                            }
                                        }
                                    </script>
                                    <script type="module">
                                        import {
                                            ClassicEditor,
                                            Essentials,
                                            Bold,
                                            Italic,
                                            Font,
                                            Paragraph
                                        } from 'ckeditor5';

                                        ClassicEditor
                                            .create( document.querySelector( '#editor' ), {
                                                plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                                                toolbar: [
                                                    'undo', 'redo', '|', 'bold', 'italic', '|',
                                                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                                                ]
                                            } )
                                            .then( /* ... */ )
                                            .catch( /* ... */ );
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/historial') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar Nuevo</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
