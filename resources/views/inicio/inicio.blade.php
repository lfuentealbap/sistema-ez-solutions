 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>

 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 <!-- Favicon-->
 <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
 <!-- Bootstrap icons-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
 <!--Iconos Font Awesome-->
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
 integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


 <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="fondo-principal">

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container px-5">
            <a class="navbar-brand logo-inicio" href="#!"> <img src="img/inicio/logo.png" class="logo-inicio" alt="EZ Solutions"></img> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#scrollContacto">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Plataforma Técnico</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 align-items-center my-4">
            <div class="col-lg-6"><img class="img-fluid rounded mb-4 mb-lg-0 img-presentacion" src="img/inicio/logo.png" alt="Logo empresa" /></div>
            <div class="col-lg-4">
                <h1 class="font-weight-light">EZ Solutions</h1>
                <p>Somos una empresa dedicada a los servicios de informática y de seguridad. Realizamos instalaciones de cámaras y alarmas, además somos servicio técnico de computadores y realizamos requerimientos técnicos a empresas.</p>

            </div>
        </div>
    </div>


    <div id="carouselExampleCaptions" class="carousel slide" style="" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Servicios Informaticos"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Instalacion de alarmas"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Instalacion de Camaras"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/inicio/camaras.jpg" class="d-block w-100" alt="..."></img>
                <div class ="carousel-caption d-none d-md-block">
                <h5>Instalación de cámaras</h5>
                <p>Tenga el control de su hogar o comercio con cámaras HD.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/inicio/alarma.jpg" class="d-block w-100" alt="..."></img>
                <div class ="carousel-caption d-none d-md-block">
                <h5>Instalación de alarmas</h5>
                <p>Proteja su hogar o local con nuestro sistema de alarmas</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/inicio/formateo.jpg" class="d-block w-100" alt="..."></img>
                <div class ="carousel-caption d-none d-md-block">
                <h5>Servicio Técnico de Computadores</h5>
                <p>Su computador no está funcionando bien? Contáctenos y se lo arreglamos!</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>


    <div class="container">
        <h1 class="" id="scrollContacto">Contáctenos</h1>
        <p>Puedes encontrarnos en nuestras redes sociales</p>
        <a href="https://www.facebook.com/hp.compaq.7146" class="text-dark text-left link-rrss"> <i class="bi bi-facebook"></i> Facebook</a>
        <span> </span>
        <p class="text-dark text-left link-rrss"> <i class="bi bi-whatsapp"></i> Whatsapp: +56987339973</p>
        <a href="mailto: soporte@ezsolutions.cl" class="text-dark text-left link-rrss"> <i class="bi bi-envelope"></i> Correo electronico: soporte@ezsolutions.cl</a>
    </div>



    <footer class="py-5 pie-pagina">
        <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">EZ Solutions 2022</p></div>
    </footer>
</div>
