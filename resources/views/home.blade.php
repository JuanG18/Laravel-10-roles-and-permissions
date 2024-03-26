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
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dashboard-background">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <p>This is your application dashboard.</p>

                    <div class="row">
                        @canany(['create-role', 'edit-role', 'delete-role'])
                            <div class="col-md-6 mb-3">
                                <a class="btn btn-primary btn-block" href="{{ route('roles.index') }}">
                                    <i class="bi bi-person-fill-gear"> Gestionar Roles</i>
                                </a>
                            </div>
                        @endcanany

                        @canany(['create-user', 'edit-user', 'delete-user'])
                            <div class="col-md-6 mb-3">
                                <a class="btn btn-success btn-block" href="{{ route('users.index') }}">
                                    <i class="bi bi-people"> Gestionar Usuarios</i>
                                </a>
                            </div>
                        @endcanany

                        @canany(['create-product', 'edit-product', 'delete-product'])
                            <div class="col-md-6 mb-3">
                                <a class="btn btn-warning btn-block" href="{{ route('products.index') }}">
                                    <i class="bi bi-bag"> Gestionar Productos</i>
                                </a>
                            </div>
                        @endcanany

                        @canany(['create-formulario', 'edit-formulario'])
                            <div class="col-md-6 mb-3">
                                <a class="btn btn-info btn-block" href="{{ route('formularios.index') }}">
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
