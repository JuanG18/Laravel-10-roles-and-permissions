@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Formularios del usuario {{ $user->name }}</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Actividad</th>
                    <!-- Agrega más columnas según los campos de tus formularios -->
                </tr>
            </thead>
            <tbody>
                @foreach ($formularios as $formulario)
                    <tr>
                        <td>{{ $formulario->id }}</td>
                        <td>{{ $formulario->actividad }}</td>
                        <!-- Agrega más columnas según los campos de tus formularios -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
