@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Gestionar Roles</h5>
    </div>
    <div class="card-body">
        @can('create-role')
            <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm mb-3"><i class="bi bi-plus-circle"></i> Agregar Nuevo Rol</a>
        @endcan
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $role->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Ver</a>
                                @if ($role->name!='Super Admin')
                                    @can('edit-role')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm ms-1"><i class="bi bi-pencil-square"></i> Editar</a>
                                    @endcan
                                    @can('delete-role')
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="ms-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar este rol?');"><i class="bi bi-trash"></i> Eliminar</button>
                                        </form>
                                    @endcan
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <div class="alert alert-danger mb-0" role="alert">
                                <strong>¡No se encontraron roles!</strong>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $roles->links() }}
        </div>
    </div>
</div>
@endsection
