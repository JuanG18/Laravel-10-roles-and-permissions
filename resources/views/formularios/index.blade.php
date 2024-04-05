@extends('layouts.app')

@section('content')

<style>
    .transparent-card {
    background-color: rgba(255, 255, 255, 0.7);
    border: none;
    border-radius: 10px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card transparent-card">
                <div class="card-header">Listado de Formularios</div>

                <div class="card-header d-flex justify-content-end">
                        <form action="{{ route('formularios.index') }}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="creador" name="creador" placeholder="Buscar por Creador">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>



                <div class="card-header ">
                @can('create-formulario')
                  <a href="{{ route('formularios.create') }}" class="btn btn-outline-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Llenar formulario</a>
                    @endcan
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Creador</th>
                                    <th>Fecha Creacion</th>
                                    <th>Actividad</th>
                                    <th>Escala</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formularios as $formulario)
                                <tr>
                                    <td>{{ $formulario->id }}</td>
                                    <td>{{ $formulario->user->name }}</td>
                                    <td>{{ $formulario->fecha_elaboracion }}</td>
                                    <td>{{ $formulario->actividad }}</td>
                                    <td>{{ $formulario->escala }}</td>


                                    @can('edit-formulario')
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('formularios.edit', $formulario->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                                            <a href="{{ route('formularios.show', $formulario->id) }}" class="btn btn-outline-primary btn-sm">Ver</a>
                                        </div>
                                    </td>
                                    @endcan

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $formularios->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection
