@extends('layouts.admin')

@section('header', 'Modificar historial')

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/historial',$historial->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Paciente</label> <b>*</b>
                                    <select name="paciente_id" id="" class="form-control">
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}" {{ $historial->paciente_id == $paciente->id ? 'selected':'' }}>{{ $paciente->apellidos }} {{ $paciente->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de la cita medica</label> <b>*</b>
                                    <input type="date"  value="{{ $historial->fecha_visita }}" name="fecha_visita" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Descripcion de la Cita</label> <b>*</b>
                                    <textarea name="detalle" id="editor" class="form-control" cols="30" rows="10" style="width: 100%">{!! $historial->detalle !!}</textarea>
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
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
