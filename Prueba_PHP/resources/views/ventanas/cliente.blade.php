@extends('layouts.plantilla')

@section('cuerpo')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <a class="navbar-brand mb-0 h1" href="#">Contratistas incidentes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <center>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoCliente">
                Agregar cliente
            </button>

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoIncidente">
                Agregar incidente
            </button>
        </center>
    </nav>

    <div class="container-fluid"></div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($showcliente as $client)
                        <tr>
                            <td>{{ $client->cedula }}</td>
                            <td>{{ $client->nombres_cliente }}</td>
                            <td>{{ $client->apellidos_cliente }}</td>
                            <td>
                                <form action="/cliente/{{ $client->cedula }}" method="POST">
                                    <a href="/cliente/{{ $client->cedula }}/edit" class="btn btn-info">Editar</a>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger" value="Eliminar">
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Texto</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($showincidente as $incident)
                        <tr>
                            <th scope="row">{{ $incident->id }}</th>
                            <td>{{ $incident->id_usuario }}</td>
                            <td>{{ $incident->id_cliente }}</td>
                            <td>{{ $incident->descripcion }}</td>
                            <td>{{ $incident->reporte }}</td>
                            <td>
                                <form action="/incidente/{{ $incident->id }}" method="POST">
                                    <a href="/incidente/{{ $incident->id }}/edit" class="btn btn-info">Editar</a>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger " value="Eliminar">
                                </form>

                            </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>



    <div class="modal fade" id="nuevoCliente" tabindex="-1" aria-labelledby="nuevoClienteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevoClienteLabel">Agregar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/cliente" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input type="number" class="form-control" id="cedula" name="cedula"
                                placeholder="Agregue cedula">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Agregue Nombres">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Agregue Apellidos">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cliente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="nuevoIncidente" tabindex="-1" aria-labelledby="nuevoIncidenteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevoIncidenteLabel">Nuevo Incidente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/incidente" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cliente">Seleccione un cliente</label>
                            <select class="form-control" id="cliente" name="cliente">
                                <option>Seleccione un cliente</option>
                                @foreach ($showcliente as $client)
                                    <option value="{{ $client->cedula }}">{{ $client->nombres_cliente }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="text">Agregue texto</label>
                            <textarea class="form-control" id="text" name="text" rows="6"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Example file input</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar incidente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="borrarCliente" tabindex="-1" aria-labelledby="borrarClienteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Borrar Cliente</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger">Borrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="borrarIncidente" tabindex="-1" aria-labelledby="borrarIncidenteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Borrar Incidente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Esta seguro de borrar el incidente?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger">Borrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
