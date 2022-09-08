<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Plataforma de EZ Solutions') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/validarRut.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('js/tablas.js') }}"></script>
    <script src="{{ asset('js/signature_pad.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

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
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">

</head>

<body class="fondo-plataforma sb-nav-fixed">

    @auth
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark navbar-plataforma">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ url('/plataforma') }}"><img src="{{ asset('img/inicio/logo.png') }}"
                    style="width: 30px; height: 20px;" alt="EZ">{{ __('Plataforma') }}
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                    class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">

                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    @endauth

    @auth
        <div id="layoutSidenav">

            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion"
                    style="background-image: linear-gradient(to top, #00c6fb 0%, #3075e4 100%);
                color: rgb(0, 0, 0);">

                    <div class="sb-sidenav-menu">
                        <div class="nav" style="color: azure">
                            <div class="sb-sidenav-menu-heading">Principal</div>
                            <a class="nav-link" href="{{ url('/plataforma') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Inicio
                            </a>
                            @auth

                                @if (Auth::user()->rol == 'jefe')
                                    <div class="sb-sidenav-menu-heading">Menú del trabajador</div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTrabajos" aria-expanded="false"
                                        aria-controls="collapseTrabajos">
                                        <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                        Trabajos
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseTrabajos" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.mistrabajos') }}">Todos
                                                mis
                                                trabajos</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.todosencurso') }}">Trabajos
                                                en
                                                curso</a>
                                            <a class="nav-link" href="{{ route('plataforma.ot.index') }}">Ver
                                                ordenes de trabajo</a>

                                        </nav>
                                    </div>

                                    <div class="sb-sidenav-menu-heading">Menú del administrador</div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseAdminTrabajos" aria-expanded="false"
                                        aria-controls="collapseAdminTrabajos">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users-crown"></i></div>
                                        Administrar trabajos
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseAdminTrabajos" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.index') }}">Ver todos los trabajos</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.editar') }}">Editar
                                                trabajo</a>
                                            <a class="nav-link"
                                                href="{{ route('plataforma.trabajos.suspenderT') }}">Suspender
                                                trabajo</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.cancelarT') }}">Cancelar
                                                trabajo</a>

                                            <a class="nav-link" href="{{ route('plataforma.trabajos.create') }}">Registrar
                                                nuevo
                                                trabajo</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.rendimiento') }}">Generar informe de rendimiento del mes</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.trealizados') }}">Generar informe de trabajos realizados</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.trabajoshoy') }}">Ver
                                                trabajos del
                                                día</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.cantidadT') }}">Mostrar
                                                cantidad de
                                                trabajos realizados por empleado</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.sueldos') }}">Mostrar estimación
                                                de sueldo de empleados</a>

                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEmpleados" aria-expanded="false"
                                        aria-controls="collapseEmpleados">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                        Empleados
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseEmpleados" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('register') }}">Registrar nuevo
                                                empleado</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajadores.index') }}">Ver
                                                Empleados</a>
                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseCotizaciones" aria-expanded="false"
                                        aria-controls="collapseCotizaciones">
                                        <div class="sb-nav-link-icon"><i class="fas fa-money-check-edit-alt"></i></div>
                                        Cotizaciones
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseCotizaciones" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.cotizaciones.create') }}">Crear
                                                cotización</a>

                                            <a class="nav-link" href="{{ route('plataforma.cotizaciones.index') }}">Ver
                                                cotizaciones</a>

                                            <a class="nav-link" href="{{ route('plataforma.cotizaciones.marcar') }}">Marcar
                                                cotización</a>
                                            <a class="nav-link" href="{{ route('plataforma.productos.index') }}">Ver
                                                productos para cotización</a>

                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGastos" aria-expanded="false"
                                        aria-controls="collapseGastos">
                                        <div class="sb-nav-link-icon"><i class="fas fa-comment-dollar"></i></div>
                                        Gastos
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseGastos" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.gastos.create') }}">Crear
                                                gasto</a>
                                                <a class="nav-link" href="{{ route('plataforma.gastos.index') }}">Ver
                                                    gastos</a>
                                            <a class="nav-link" href="{{ route('plataforma.gastos.editar') }}">Editar
                                                gasto</a>
                                            <a class="nav-link" href="{{ route('plataforma.gastos.eliminar') }}">Eliminar
                                                gasto</a>
                                            <a class="nav-link" href="{{ route('plataforma.gastos.informe') }}">Generar
                                                informe de los
                                                gastos del mes</a>

                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseClientes" aria-expanded="false"
                                        aria-controls="collapseClientes">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-tag"></i></div>
                                        Clientes
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseClientes" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.clientes.create') }}">Registrar
                                                cliente</a>

                                            <a class="nav-link" href="{{ route('plataforma.clientes.index') }}">Ver
                                                clientes</a>

                                        </nav>
                                    </div>
                                @endif
                                @if (Auth::user()->rol == 'secretaria')
                                    <div class="sb-sidenav-menu-heading">Menú de secretari@</div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseAdminTrabajos" aria-expanded="false"
                                        aria-controls="collapseAdminTrabajos">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users-crown"></i></div>
                                        Administrar trabajos
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseAdminTrabajos" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.index') }}">Ver todos los trabajos</a>
                                            <a class="nav-link" href="{{ route('plataforma.ot.index') }}">Ver
                                                ordenes de trabajo</a>

                                                <a class="nav-link" href="{{ route('plataforma.trabajos.rendimiento') }}">Generar informe de rendimiento del mes</a>
                                                <a class="nav-link" href="{{ route('plataforma.trabajos.trealizados') }}">Generar informe de trabajos realizados</a>

                                            <a class="nav-link" href="{{ route('plataforma.trabajos.trabajoshoy') }}">Ver
                                                trabajos del
                                                día</a>
                                                <a class="nav-link" href="{{ route('plataforma.trabajos.cantidadT') }}">Mostrar
                                                    cantidad de
                                                    trabajos realizados por empleado</a>
                                                <a class="nav-link" href="{{ route('plataforma.trabajos.sueldos') }}">Mostrar estimación
                                                    de sueldo de empleados</a>

                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEmpleados" aria-expanded="false"
                                        aria-controls="collapseEmpleados">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                        Empleados
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseEmpleados" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('register') }}">Registrar nuevo
                                                empleado</a>
                                            <a class="nav-link" href="{{ route('plataforma.trabajadores.index') }}">Ver
                                                Empleados</a>
                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseCotizaciones" aria-expanded="false"
                                        aria-controls="collapseCotizaciones">
                                        <div class="sb-nav-link-icon"><i class="fas fa-money-check-edit-alt"></i></div>
                                        Cotizaciones
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseCotizaciones" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.cotizaciones.create') }}">Crear
                                                cotización</a>

                                            <a class="nav-link" href="{{ route('plataforma.cotizaciones.index') }}">Ver
                                                cotizaciones</a>

                                            <a class="nav-link" href="{{ route('plataforma.cotizaciones.marcar') }}">Marcar
                                                cotización</a>
                                            <a class="nav-link" href="{{ route('plataforma.productos.index') }}">Ver
                                                productos para cotización</a>

                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGastos" aria-expanded="false"
                                        aria-controls="collapseGastos">
                                        <div class="sb-nav-link-icon"><i class="fas fa-comment-dollar"></i></div>
                                        Gastos
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseGastos" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.gastos.create') }}">Crear
                                                gasto</a>
                                                <a class="nav-link" href="{{ route('plataforma.gastos.index') }}">Ver
                                                    gastos</a>
                                            <a class="nav-link" href="{{ route('plataforma.gastos.editar') }}">Editar
                                                gasto</a>
                                            <a class="nav-link" href="{{ route('plataforma.gastos.eliminar') }}">Eliminar
                                                gasto</a>
                                            <a class="nav-link" href="{{ route('plataforma.gastos.informe') }}">Generar
                                                informe de los
                                                gastos del mes</a>

                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseClientes" aria-expanded="false"
                                        aria-controls="collapseClientes">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-tag"></i></div>
                                        Clientes
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseClientes" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.clientes.create') }}">Registrar
                                                cliente</a>

                                            <a class="nav-link" href="{{ route('plataforma.clientes.index') }}">Ver
                                                clientes</a>

                                        </nav>
                                    </div>
                                @endif

                                @if (Auth::user()->rol == 'trabajador')
                                    <div class="sb-sidenav-menu-heading">Menú del trabajador</div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTrabajos" aria-expanded="false"
                                        aria-controls="collapseTrabajos">
                                        <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                        Trabajos
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseTrabajos" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.trabajos.mistrabajos') }}">Todos
                                                mis
                                                trabajos</a>
                                            <a class="nav-link"
                                                href="{{ route('plataforma.trabajos.todosencurso') }}">Trabajos en
                                                curso</a>
                                            <a class="nav-link" href="{{ route('plataforma.ot.index') }}">Ver
                                                ordenes de trabajo</a>

                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGastos" aria-expanded="false"
                                        aria-controls="collapseGastos">
                                        <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                        Gastos
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseGastos" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('plataforma.gastos.create') }}">Crear
                                                gasto</a>
                                        </nav>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="sb-sidenav-footer" style="background-color: #00c3fe">
                            <div class="small">Iniciaste sesión como:</div>
                            {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}
                        </div>
                    @endauth

                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main class="py-4">
                    <div class="container-fluid">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if (isset($errors) && $errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @yield('content')

                </main>

            </div>
        </div>


        </div>
    @else
        </nav>
        <main class="py-4" style="padding-top: 10px">
            <div class="container-fluid">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')

        </main>

    @endauth
</body>
@yield('script')
</html>
