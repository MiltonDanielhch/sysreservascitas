@extends('layouts.admin')

@section('header')
    <h1>Usuario: {{ $usuario->name }}</h1>
@endsection

@section('content')
<div class="col-md-6">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">¿estas seguro de eliminar un Registro?</h3>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/usuarios',$usuario->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Nombre del Usuario</label>
                            <input type="text" value="{{ $usuario->name }}" name="name" class="form-control" disabled>
                            @error('name')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Email</label> <b>*</b>
                            <input type="email" value="{{ $usuario->email }}" name="email" class="form-control" disabled>
                        </div>
                        @error('email')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
