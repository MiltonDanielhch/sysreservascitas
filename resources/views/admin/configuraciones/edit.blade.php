@extends('layouts.admin')

@section('header', 'Modificar Configuración')

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/configuraciones',$configuracion->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre de la Clinica/hospital</label> <b>*</b>
                                    <input type="text" value="{{ $configuracion->nombre }}" name="nombre" class="form-control">
                                    @error('nombre')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Dirección</label> <b>*</b>
                                    <input type="address" value="{{ $configuracion->direccion }}" name="direccion"
                                        class="form-control">
                                    @error('direccion')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Teléfono</label> <b>*</b>
                                    <input type="text" value="{{ $configuracion->telefono }}" name="telefono"
                                        class="form-control">
                                    @error('telefono')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Correo</label> <b>*</b>
                                    <input type="text" value="{{ $configuracion->correo }}" name="correo" class="form-control">
                                    @error('correo')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Logotipo</label>
                            <input type="file" id="file" name="logo" class="form-control">
                            <br>
                            <center>
                                <output id="list">
                                    <img src="{{ url('storage/'.$configuracion->logo) }}" alt="logo" width="80px">
                                </output>
                            </center>

                            <script>
                                function archivo(evt){
                                    var files = evt.target.files; //FilesList object
                                    //obtenemos la imagen del campo "file".
                                    for(var i = 0, f; f = files[i]; i++){
                                        //solo admitimos imagenes.
                                        if(!f.type.match('image.*')){
                                            continue;
                                        }
                                        var reader = new FileReader();
                                        reader.onload = (function (theFile){
                                            return function (e){
                                                //insertamos la imagen
                                                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
                                            };
                                        })(f);
                                        reader.readAsDataURL(f);
                                    }
                                }
                                document.getElementById('file').addEventListener('change', archivo, false);
                            </script>
                        </div>
                    </div>

                </div>


                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <a href="{{ url('admin/configuraciones') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Actualizar Nuevo</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
