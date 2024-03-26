@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Listado de Formularios</div>
                <div class="card-body">
                @can('create-product')
                  <a href="{{ route('formularios.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>Llenar formulario</a>
                    @endcan
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha de Elaboración</th>
                                    <th>Actividad</th>
                                    <th>Nivel Operativo</th>
                                    <!-- Agrega aquí más columnas según la estructura de tu formulario -->
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formularios as $formulario)
                                <tr>
                                    <td>{{ $formulario->id }}</td>
                                    <td>{{ $formulario->fecha_elaboracion }}</td>
                                    <td>{{ $formulario->actividad }}</td>
                                    <td>{{ $formulario->nivel_operativo }}</td>
                                    <!-- Agrega aquí más columnas según la estructura de tu formulario -->
                                    <td>
                                        <a href="{{ route('formularios.show', $formulario->id) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('formularios.edit', $formulario->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <!-- Agrega más acciones si es necesario, como eliminar -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
