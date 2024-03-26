<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestion</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-image: url('/img/prueba.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-sm custom-navbar">
            <div class="container justify-content-between align-items-center">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    SuperGiros.com
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <style>

                .nav-link {
                   transition: color 0.4s ease, background-color 0.4s ease;
                    }

                .nav-link:hover {
                color: #fff; /* Color del texto al pasar el cursor */
                background-color: #3B6DA3; /* Color de fondo al pasar el cursor */
                text-decoration: none; /* Quita la subrayado del texto */
                             }
                        </style>
                        @canany(['create-role', 'edit-role', 'delete-role'])
                        <li><a class="nav-link font-weight-bold;" href="{{ route('roles.index') }}">Roles</a></li>
                        @endcanany
                        @canany(['create-user', 'edit-user', 'delete-user'])
                        <li><a class="nav-link font-weight-bold" href="{{ route('users.index') }}">Usuarios</a></li>
                        @endcanany
                        @canany(['create-product', 'edit-product', 'delete-product'])
                        <li><a class="nav-link font-weight-bold" href="{{ route('products.index') }}">Productos</a></li>
                        @endcanany
                        @canany(['create-formulario', 'edit-formulario'])
                        <li><a class="nav-link font-weight-bold" href="{{ route('formularios.create') }}">Llenar Formulario</a></li>
                        @endcanany

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        <h3 class="text-center mt-4 mb-4" style="color: white; font-weight: bold; font-size: 35px;">Gestion de Administrador</h3>
                        @yield('content')

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
