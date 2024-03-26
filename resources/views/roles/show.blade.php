@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary text-white">
                <div class="float-start">
                    Información del Rol
                </div>
                <div class="float-end">
                    <a href="{{ route('roles.index') }}" class="btn btn-light btn-sm">&larr; Volver</a>
                </div>
            </div>
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                    <div class="col-md-6">
                        <p class="form-control-plaintext">{{ $role->name }}</p>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="roles" class="col-md-4 col-form-label text-md-end text-start"><strong>Permisos:</strong></label>
                    <div class="col-md-6">
                        @if ($role->name == 'Super Admin')
                            <span class="badge bg-primary">Todos</span>
                        @else
                            @forelse ($rolePermissions as $permission)
                                <span class="badge bg-primary">{{ $permission->name }}</span>
                            @empty
                                <span class="text-muted">No hay permisos asignados</span>
                            @endforelse
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
