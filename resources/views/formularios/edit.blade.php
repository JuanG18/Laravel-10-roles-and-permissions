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
        <div class="col-md-8">
            <div class="card transparent-card">
                <div class="card-header">Editar Formulario</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('formularios.update', $formulario->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Actividad -->
                        <div class="form-group row">
                            <label for="actividad" class="col-md-4 col-form-label text-md-right">Actividad</label>
                            <div class="col-md-6">
                                <input id="actividad" type="text" class="form-control @error('actividad') is-invalid @enderror" name="actividad" value="{{ $formulario->actividad }}" required autofocus>
                                @error('actividad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <!-- Niveles -->
                        <div class="form-group row">
                            <label for="nivel_operativo" class="col-md-4 col-form-label text-md-right">Nivel Operativo</label>
                            <div class="col-md-6">
                                <select id="nivel_operativo" class="form-control @error('nivel_operativo') is-invalid @enderror" name="nivel_operativo" required>
                                    <option value="Alta" {{ $formulario->nivel_operativo == 'Alta' ? 'selected' : '' }}>Alta</option>
                                    <option value="Medio" {{ $formulario->nivel_operativo == 'Medio' ? 'selected' : '' }}>Medio</option>
                                    <option value="Bajo" {{ $formulario->nivel_operativo == 'Bajo' ? 'selected' : '' }}>Bajo</option>
                                </select>
                                @error('nivel_operativo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nivel_financiero" class="col-md-4 col-form-label text-md-right">Nivel Financiero</label>
                            <div class="col-md-6">
                                <select id="nivel_financiero" class="form-control @error('nivel_financiero') is-invalid @enderror" name="nivel_financiero" required>
                                    <option value="Alta" {{ $formulario->nivel_financiero == 'Alta' ? 'selected' : '' }}>Alta</option>
                                    <option value="Medio" {{ $formulario->nivel_financiero == 'Medio' ? 'selected' : '' }}>Medio</option>
                                    <option value="Bajo" {{ $formulario->nivel_financiero == 'Bajo' ? 'selected' : '' }}>Bajo</option>
                                </select>
                                @error('nivel_financiero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nivel_legal" class="col-md-4 col-form-label text-md-right">Nivel Legal</label>
                            <div class="col-md-6">
                                <select id="nivel_legal" class="form-control @error('nivel_legal') is-invalid @enderror" name="nivel_legal" required>
                                    <option value="Alta" {{ $formulario->nivel_legal == 'Alta' ? 'selected' : '' }}>Alta</option>
                                    <option value="Medio" {{ $formulario->nivel_legal == 'Medio' ? 'selected' : '' }}>Medio</option>
                                    <option value="Bajo" {{ $formulario->nivel_legal == 'Bajo' ? 'selected' : '' }}>Bajo</option>
                                </select>
                                @error('nivel_legal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">RTO (Tiempo de Recuperación Objetivo)</label>
                            <div class="col-md-2">
                                <input type="number" class="form-control @error('rto_days') is-invalid @enderror" name="rto_days" value="{{ $formulario->rto_days }}" required placeholder="Días">
                                @error('rto_days')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control @error('rto_hours') is-invalid @enderror" name="rto_hours" value="{{ $formulario->rto_hours }}" required placeholder="Horas">
                                @error('rto_hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control @error('rto_minutes') is-invalid @enderror" name="rto_minutes" value="{{ $formulario->rto_minutes }}" required placeholder="Minutos">
                                @error('rto_minutes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">RPO (Tiempo de Punto de Recuperación)</label>
                            <div class="col-md-2">
                                <input type="number" class="form-control @error('rpo_days') is-invalid @enderror" name="rpo_days" value="{{ $formulario->rpo_days }}" required placeholder="Días">
                                @error('rpo_days')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control @error('rpo_hours') is-invalid @enderror" name="rpo_hours" value="{{ $formulario->rpo_hours }}" required placeholder="Horas">
                                @error('rpo_hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control @error('rpo_minutes') is-invalid @enderror" name="rpo_minutes" value="{{ $formulario->rpo_minutes }}" required placeholder="Minutos">
                                @error('rpo_minutes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                        <label for="recurso_humano" class="col-md-4 col-form-label text-md-right">Recursos Humanos</label>
                        <div class="col-md-6">
                      <textarea id="recurso_humano" class="form-control @error('recurso_humano') is-invalid @enderror" name="recurso_humano" required>{{ $formulario->recurso_humano }}</textarea>
        @error('recurso_humano')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                        <br>
                        <div class="form-group row">
                            <label for="herramientas" class="col-md-4 col-form-label text-md-right">Herramientas</label>
                            <div class="col-md-6">
                                <textarea id="herramientas" class="form-control @error('herramientas') is-invalid @enderror" name="herramientas" required>{{ $formulario->herramientas }}</textarea>
                                @error('herramientas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="registros_vitales" class="col-md-4 col-form-label text-md-right">Registros Vitales Requeridos</label>
                            <div class="col-md-6">
                                <textarea id="registros_vitales" class="form-control @error('registros_vitales') is-invalid @enderror" name="registros_vitales" required>{{ $formulario->registros_vitales }}</textarea>
                                @error('registros_vitales')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="recomendaciones_recuperacion" class="col-md-4 col-form-label text-md-right">Recomendaciones para la Recuperación</label>
                            <div class="col-md-6">
                                <textarea id="recomendaciones_recuperacion" class="form-control @error('recomendaciones_recuperacion') is-invalid @enderror" name="recomendaciones_recuperacion" required>{{ $formulario->recomendaciones_recuperacion }}</textarea>
                                @error('recomendaciones_recuperacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success">
                                    Guardar Cambios
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
