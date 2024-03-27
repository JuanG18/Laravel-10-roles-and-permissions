@extends('layouts.app')

@section('content')
<style>

    .dashboard-background {
        background-color: rgba(255, 255, 255, 0.8);
        border: none;
        box-shadow: none;
    }


    .btn-block:hover {
        color: #fff;
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .dashboard-card {
    margin-bottom: 20px;
    border: none;
    box-shadow: none;
    background-color: rgba(0, 0, 255, 0.1);
    transition: background-color 0.3s ease;
    }

    .dashboard-card:hover {
    background-color: aquamarine; /* Cambia el color al pasar el cursor */
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
        text-align:center;
    }

    .card-text {
        font-size: 18px;
        text-align:center;
    }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card dashboard-background">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h5 class="card-title">Usuarios</h5>
                                    <p class="card-text">Cantidad: {{ $usuarios }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h5 class="card-title">Formularios</h5>
                                    <p class="card-text">Cantidad: {{ $formularios }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h5 class="card-title">Roles</h5>
                                    <p class="card-text">Cantidad: {{ $roles }}</p>
                                </div>
                            </div>
                        </div>


                    <div class="row">
                        @canany(['create-role', 'edit-role', 'delete-role'])
                            <div class="col-md-6 mb-3">
                                <a class="btn btn-outline-primary" href="{{ route('roles.index') }}">
                                    <i class="bi bi-person-fill-gear"> Gestionar Roles</i>
                                </a>
                            </div>
                        @endcanany

                        @canany(['create-user', 'edit-user', 'delete-user'])
                            <div class="col-md-6 mb-3">
                                <a class="btn btn-outline-secondary" href="{{ route('users.index') }}">
                                    <i class="bi bi-people"> Gestionar Usuarios</i>
                                </a>
                            </div>
                        @endcanany

                        @canany(['create-product', 'edit-product', 'delete-product'])
                            <div class="col-md-6 mb-3">
                                <a class="btn btn-outline-dark" href="{{ route('products.index') }}">
                                    <i class="bi bi-bag"> Gestionar Productos</i>
                                </a>
                            </div>
                        @endcanany

                        @canany(['create-formulario', 'edit-formulario'])
                            <div class="col-md-6 mb-3">
                                <a class="btn btn-outline-info" href="{{ route('formularios.index') }}">
                                    <i class="bi bi-clipboard2"> Gestionar Formularios</i>
                                </a>
                            </div>
                        @endcanany
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
