@extends('layouts.app')

@section('content')
<style>
    .transparent-card {
        background-color: rgba(255, 255, 255, 0.7);
        border: none;
        border-radius: 10px;
        padding: 20px;
    }
    .card-header {
        background-color: #3490dc;
        color: white;
        padding: 15px;
        border-radius: 10px 10px 0 0;
        margin-bottom: 20px;
    }
    .details-table {
        width: 100%;
    }
    .details-table td {
        padding: 10px 0;
    }
    .details-table td:first-child {
        width: 30%;
        font-weight: bold;
    }
    .details-table td:last-child {
        width: 70%;
    }
</style>

<div class="container">
    <div class="card transparent-card">
        <div class="card-header">Detalles del Formulario</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="details-table">
                        <tbody>
                            <tr>
                                <td>Fecha de Elaboración:</td>
                                <td>{{ $formulario->fecha_elaboracion }}</td>
                            </tr>
                            <tr>
                                <td>Nivel Operativo:</td>
                                <td>{{ $formulario->nivel_operativo }}</td>
                            </tr>
                            <tr>
                                <td>Nivel Financiero:</td>
                                <td>{{ $formulario->nivel_financiero }}</td>
                            </tr>
                            <tr>
                                <td>Nivel Legal:</td>
                                <td>{{ $formulario->nivel_legal }}</td>
                            </tr>
                            <tr>
                                <td>RTO (Días):</td>
                                <td>{{ $formulario->rto_days }}</td>
                            </tr>
                            <tr>
                                <td>RTO (Horas):</td>
                                <td>{{ $formulario->rto_hours }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="details-table">
                        <tbody>
                            <tr>
                                <td>RTO (Minutos):</td>
                                <td>{{ $formulario->rto_minutes }}</td>
                            </tr>
                            <tr>
                                <td>RPO (Días):</td>
                                <td>{{ $formulario->rpo_days }}</td>
                            </tr>
                            <tr>
                                <td>RPO (Horas):</td>
                                <td>{{ $formulario->rpo_hours }}</td>
                            </tr>
                            <tr>
                                <td>RPO (Minutos):</td>
                                <td>{{ $formulario->rpo_minutes }}</td>
                            </tr>
                            <tr>
                                <td>Recurso Humano:</td>
                                <td>{{ $formulario->recurso_humano }}</td>
                            </tr>
                            <tr>
                                <td>Herramientas:</td>
                                <td>{{ $formulario->herramientas }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <table class="details-table">
                        <tbody>
                            <tr>
                                <td>Registros Vitales:</td>
                                <td>{{ $formulario->registros_vitales }}</td>
                            </tr>
                            <tr>
                                <td>Recomendaciones de Recuperación:</td>
                                <td>{{ $formulario->recomendaciones_recuperacion }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
