@extends('layouts.app')

@section('content')
<style>
    .transparent-card {
    background-color: rgba(255, 255, 255, 0.7);
    border: none;
    border-radius: 10px;
}
    .table-transparent {
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 10px;
    }
</style>




<div class="card transparent-card">
    <div class="card-header">Administrar Usuarios</div>
    <div class="card-body ">
        @can('create-user')
            <a href="{{ route('users.create') }}" class="btn btn-outline-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Agregar Nuevo Usuario</a>
        @endcan
        <table class="table table-striped table-bordered table-transparent">
            <thead>
                <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col">Roles</th>
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @forelse ($user->getRoleNames() as $role)
                            <span class="badge bg-primary">{{ $role }}</span>
                        @empty
                        @endforelse
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-info"><i class="bi bi-eye"></i> Ver</a>

                            @if (in_array('Super Admin', $user->getRoleNames()->toArray() ?? []) )
                                @if (Auth::user()->hasRole('Super Admin'))
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                                @endif
                            @else
                                @can('edit-user')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                                @endcan

                                @can('delete-user')
                                    @if (Auth::user()->id!=$user->id)
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Deseas eliminar a este usuario?');"><i class="bi bi-trash"></i> Eliminar</button>
                                    @endif
                                @endcan
                            @endif

                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>¡No se encontraron usuarios!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $users->links() }}

    </div>
</div>

@endsection
