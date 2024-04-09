@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4" style="font-size: 24px; color:white">Estos son tus formularios {{ $user->name }}</h3>
    <a href="{{ route('formulario.generateWord', ['id' => $user->id]) }}" class="btn btn-primary mb-4">Descargar</a>

    <style>
        .square-card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .card-body {
            padding: 10px;
        }


        .transparent-card {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        }

        .card-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-bottom: none; /* Elimina la línea de abajo */
        }


        .list-group-item {
            padding: 5px;
            font-size: 16px;
        }

        .list-group-item strong {
            font-weight: bold;
        }


        @media (min-width: 768px) {
            .two-column-grid .col-md-6 {
                flex: 0 0 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }
    </style>

    <div class="row two-column-grid">
        @foreach ($formularios as $formulario)
        <div class="col-md-6">
            <div class="card transparent-card mb-3 square-card">
                <div class="card-header" id="headingForm{{ $formulario->id }}">
                    <h2 class="mb-0">
                        <button class="btn btn-link toggle-button" type="button" data-toggle="collapse" data-target="#collapseForm{{ $formulario->id }}" aria-expanded="true" aria-controls="collapseForm{{ $formulario->id }}">
                            <span class="accordion-text">{{ $formulario->actividad }}</span>
                            <span class="accordion-icon">&#x25BC;</span>
                        </button>
                    </h2>
                </div>

                <div id="collapseForm{{ $formulario->id }}" class="collapse" aria-labelledby="headingForm{{ $formulario->id }}" data-parent="#accordionForm{{ $formulario->id }}">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Fecha de Elaboración:</strong> {{ $formulario->fecha_elaboracion }}</li>
                            <li class="list-group-item"><strong>Nivel Operativo:</strong> {{ $formulario->nivel_operativo }}</li>
                            <li class="list-group-item"><strong>Nivel Financiero:</strong> {{ $formulario->nivel_financiero }}</li>
                            <li class="list-group-item"><strong>Nivel Legal:</strong> {{ $formulario->nivel_legal }}</li>
                            <li class="list-group-item"><strong>Escala:</strong> {{ $formulario->escala }}</li>
                            <li class="list-group-item"><strong>RTO Días:</strong> {{ $formulario->rto_days }}</li>
                            <li class="list-group-item"><strong>RTO Horas:</strong> {{ $formulario->rto_hours }}</li>
                            <li class="list-group-item"><strong>RPO Días:</strong> {{ $formulario->rpo_days }}</li>
                            <li class="list-group-item"><strong>RPO Horas:</strong> {{ $formulario->rpo_hours }}</li>
                            <li class="list-group-item"><strong>Recursos Humanos:</strong> {{ $formulario->recurso_humano }}</li>
                            <li class="list-group-item"><strong>Herramientas:</strong> {{ $formulario->herramientas }}</li>
                            <li class="list-group-item"><strong>Recomendaciones de Recuperación:</strong> {{ $formulario->recomendaciones_recuperacion }}</li>
                        </ul>
                        <a href="{{ route('formularios.edit', $formulario->id) }}" class="btn btn-primary mt-3">Editar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Toggle collapse state when button is clicked
    document.querySelectorAll('.toggle-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var targetId = this.getAttribute('data-target');
            var target = document.querySelector(targetId);
            if (target.classList.contains('show')) {
                target.classList.remove('show');
                this.querySelector('.accordion-icon').innerText = '\u25BC'; // Cambia el icono a hacia abajo
            } else {
                target.classList.add('show');
                this.querySelector('.accordion-icon').innerText = '\u25B2'; // Cambia el icono a hacia arriba
            }
        });
    });
</script>
@endsection
