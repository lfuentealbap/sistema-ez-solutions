<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Plataforma de EZ Solutions') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/validarRut.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--Icons Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/plataforma.css') }}" rel="stylesheet">
</head>
<body class="fondo-plataforma">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-plataforma shadow-sm">
            <div class="container">
                <a class="navbar-brand navbar-item"  href="{{ url('/plataforma') }}"> <img src="{{ asset('img/inicio/logo.png') }}" style="width: 30px; height: 20px;" alt="EZ Solutions"> </img>
                    {{ __('Plataforma') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth

                        @if (Auth::user()->rol=='jefe')
                        <li class="nav-item dropdown navbar-item">
                            <a class="nav-link dropdown-toggle navbar-item" href="#" id="navbarDropdownTrabajos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Trabajos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownTrabajos">
                              <li><a class="dropdown-item" href="{{ route('plataforma.trabajos.mistrabajos') }}">Todos mis trabajos</a></li>
                              <li><a class="dropdown-item" href="{{ route('plataforma.trabajos.create') }}">Crear trabajo</a></li>
                              <li><a class="dropdown-item" href="{{ route('plataforma.trabajos.todosencurso') }}">Trabajos en curso</a></li>
                              <li><a class="dropdown-item" href="{{ route('plataforma.trabajos.trabajoshoy') }}">Trabajos del día</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown navbar-item">
                            <a class="nav-link dropdown-toggle navbar-item" href="#" id="navbarDropdownCotizaciones" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Gestiones
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownCotizaciones">
                              <li><a class="dropdown-item" href="{{ route('plataforma.cotizaciones.index') }}">Gestionar cotizaciones</a></li>
                              <li><a class="dropdown-item" href="{{ route('plataforma.clientes.index') }}">Gestionar clientes</a></li>
                              <li><a class="dropdown-item" href="{{ route('plataforma.productos.index') }}">Gestionar productos</a></li>
                              <li><a class="dropdown-item" href="#">Gestionar Empleados</a></li>
                              <li><a class="dropdown-item" href="{{ route('plataforma.trabajos.index') }}">Gestionar trabajos de empleados</a></li>
                            </ul>
                        </li>
{{--}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCotizaciones" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Trabajadores
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownCotizaciones">
                              <li><a class="dropdown-item" href="#">Ver todos los trabajadores</a></li>
                              <li><a class="dropdown-item" href="#">Registrar nuevo trabajador</a></li>
                              <li><a class="dropdown-item" href="#">Rendimiento trabajadores</a></li>
                              <li><a class="dropdown-item" href="#">Revisar sueldo trabajadores</a></li>
                            </ul>

                        </li>
                        {{--}}
                        @endif

                        @if (Auth::user()->rol=='trabajador')
                        <li class="nav-item dropdown navbar-item">
                            <a class="nav-link dropdown-toggle navbar-item" href="#" id="navbarDropdownTrabajos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Trabajos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownTrabajos">
                              <li><a class="dropdown-item" href="{{ route('plataforma.trabajos.mistrabajos') }}">Todos mis trabajos</a></li>
                              <li><a class="dropdown-item" href="{{ route('plataforma.trabajos.encurso') }}">Trabajos en curso</a></li>
                              <li><a class="dropdown-item" href="{{ route('plataforma.trabajos.finalizados') }}">Trabajos hechos</a></li>
                            </ul>
                          </li>
                        @endif
                        @endauth

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        {{--}}
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link navbar-item" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            {{--}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-item" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('img/trabajador/trabajador.png') }}" class="rounded float-start border border-1" alt="..." style="width: 30px; height: 30px;"> &nbsp; {{ Auth::user()->nombres }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item navbar-itemnavbar-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
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
            <div class="container-fluid">
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif

            @if (isset($errors) && $errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </main>
    </div>
</body>
</html>
