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
                <div class="card-header ">
                @can('create-formulario')
                  <a href="{{ route('formularios.create') }}" class="btn btn-outline-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Llenar formulario</a>
                    @endcan
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha Creacion</th>
                                    <th>Proceso</th>
                                    <th>Actividad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formularios as $formulario)
                                <tr>
                                    <td>{{ $formulario->id }}</td>
                                    <td>{{ $formulario->fecha_elaboracion }}</td>
                                    <td></td>
                                    <td>{{ $formulario->actividad }}</td>

                                    @can('edit-formulario')
                                    <td>
                                        <a href="{{ route('formularios.edit', $formulario->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                                    </td>
                                    @endcan

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
