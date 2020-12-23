@extends('layouts.plantilla')

@section('cuerpo')
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Editar Cliente</h5>
                    </div>
                    <div class="card-body">
                        <form action="/cliente/{{ $showcliente->cedula }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="">Cedula de indentidad</label>
                                <input id="fname" name="cedulac" type="text" placeholder="cedula" class="form-control"
                                    value="{{ $showcliente->cedula }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="">Nombre del cliente</label>
                                <input id="fname" name="nombre" type="text" placeholder="Nombres" class="form-control"
                                    value="{{ $showcliente->nombres_cliente }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos cliente</label>
                                <input id="lname" name="apellido" type="text" placeholder="Apellidos" class="form-control"
                                    value="{{ $showcliente->apellidos_cliente }}" required>
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group text-center">
                            <a href="/incidente" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
