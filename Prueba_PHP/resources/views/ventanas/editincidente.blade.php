@extends('layouts.plantilla')

@section('cuerpo')
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Editar Incidente</h5>
                    </div>
                    <div class="card-body">
                        <form action="/incidente/{{ $showincidente->id }}" class="form-horizontal" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="cliente">Seleccione un cliente</label>
                                <input id="fname" name="idcliente" type="text" class="form-control"
                                    value="{{ $showincidente->id_cliente }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="text">Agregue texto</label>
                                <textarea class="form-control" id="text" name="text"
                                    rows="6">{{ $showincidente->descripcion }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Example file input</label>
                                <input type="file" class="form-control-file" id="image" name="image"
                                    value="{{ $showincidente->reporte }}">
                            </div>
                            <a href="/cliente" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar incidente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
