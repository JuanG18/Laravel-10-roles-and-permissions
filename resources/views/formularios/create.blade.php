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
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card transparent-card">
                <div class="card-header">Crear Nuevo Formulario</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('formularios.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="actividad" class="col-md-4 col-form-label text-md-right">Actividad</label>

                            <div class="col-md-6">
                                <input id="actividad" type="text" class="form-control @error('actividad') is-invalid @enderror" name="actividad" value="{{ old('actividad') }}" required autofocus>

                                @error('actividad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nivel_operativo" class="col-md-4 col-form-label text-md-right">Nivel Operativo</label>

                            <div class="col-md-6">
                                <select id="nivel_operativo" class="form-control @error('nivel_operativo') is-invalid @enderror" name="nivel_operativo" required>
                                    <option value="Alta">Alta</option>
                                    <option value="Medio">Medio</option>
                                    <option value="Bajo">Bajo</option>
                                </select>

                                @error('nivel_operativo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Agrega aquí los campos restantes según tu estructura de formulario -->
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success">
                                    Guardar Formulario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
