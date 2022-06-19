 <!DOCTYPE html>
 <html lang="es">
 <head>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EZ Solutions - Inicio</title>


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

 </head>
 <body>
    <div class="fondo-principal">

        <nav class="navbar navbar-inicio navbar-expand-lg navbar-dark">
            <div class="container px-5">
                <a class="navbar-brand logo-inicio" href="{{ route('inicio') }}"> <img src="img/inicio/logo.png" class="logo-inicio" alt="EZ Solutions"></img> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('inicio') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#scrollContacto">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('plataforma') }}">Plataforma Técnico</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center my-4">
                <div class="col-lg-6"><img class="img-fluid rounded mb-4 mb-lg-0 img-presentacion" src="img/inicio/logo.png" alt="Logo empresa" /></div>
                <div class="col-lg-4">
                    <h1 class="font-weight-light">EZ Solutions</h1>
                    <p>Somos una empresa dedicada a los servicios de informática, seguridad y de electricidad. Realizamos instalaciones de cámaras y alarmas, además somos servicio técnico de computadores y realizamos requerimientos técnicos a empresas.</p>

                </div>
            </div>
        </div>

        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center my-4">
                <div class="col-lg-6">
                    <h2 class="font-weight-light">Conozca nuestros servicios!</h2>
                </div>
                <div class="accordion" id="acordeonServicios">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed cabecera-acordeon" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Servicios de seguridad
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse cuerpo-acordeon" aria-labelledby="headingOne" data-bs-parent="#acordeonServicios">
                        <div class="accordion-body">
                           <p>Realizamos instalaciones de cámaras y alarmas a domicilio y a empresas, proteja su negocio o propiedad con nosotros.</p>

                            <div id="carruselSeguridad" class="carousel slide " style="" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carruselSeguridad" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Lista camaras"></button>
                                    <button type="button" data-bs-target="#carruselSeguridad" data-bs-slide-to="1" aria-label="Camaras"></button>
                                    <button type="button" data-bs-target="#carruselSeguridad" data-bs-slide-to="2" aria-label="Monitoreo camaras"></button>
                                    <button type="button" data-bs-target="#carruselSeguridad" data-bs-slide-to="3" aria-label="Alarmas"></button>
                                    <button type="button" data-bs-target="#carruselSeguridad" data-bs-slide-to="4" aria-label="Monitoreo Camara desde celular"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/inicio/segu1.jpg" class="d-block w-100" alt="..."></img>
                                        <div class ="carousel-caption d-none d-md-block">
                                        <h3 class="text-carrusel">Amplia gama de cámaras</h3>
                                        <h4 class="text-carrusel">Instalamos una gran variedad de cámaras desde resolución HD a 4K (UHD)</h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/inicio/segu2.jpg" class="d-block w-100" alt="..."></img>
                                        <div class ="carousel-caption d-none d-md-block">
                                        <h3 class="text-carrusel">Instalación de cámaras</h3>
                                        <h4 class="text-carrusel">Monitoree su hogar o negocio en todo momento con nuestro sistema de cámaras</h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/inicio/segu3.jpeg" class="d-block w-100" alt="..."></img>
                                        <div class ="carousel-caption d-none d-md-block">
                                        <h3 class="text-carrusel">Instalación de alarmas</h3>
                                        <h4 class="text-carrusel">Protege o resguarde su hogar o negocio de robos con nuestro sistema de alarmas</h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/inicio/segu4.jpg" class="d-block w-100" alt="..."></img>
                                        <div class ="carousel-caption d-none d-md-block">
                                        <h3 class="text-carrusel">Monitoreo de cámaras</h3>
                                        <h4 class="text-carrusel">Nuestras cámaras cuentan con un sistema de vigilancia que puede ser instalado en su televisor para mayor facilidad de monitoreo</h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/inicio/segu5.jpg" class="d-block w-100" alt="..."></img>
                                        <div class ="carousel-caption d-none d-md-block">
                                        <h3 class="text-carrusel">Monitoreo de cámaras desde celular</h3>
                                        <h4 class="text-carrusel">Pueden monitorear sus cámaras desde la comodidad de su teléfono Android o iPhone, ya que nuestro sistema de vigilancia a través de app les permite acceder de forma fácil y directa.</h4>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carruselSeguridad" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carruselSeguridad" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed cabecera-acordeon" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Servicios informáticos
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse cuerpo-acordeon" aria-labelledby="headingTwo" data-bs-parent="#acordeonServicios">
                        <div class="accordion-body">
                            <p>Realizamos formateos y mantención de computadores, también realizamos instalación de puntos de red para que se mantenga conectado.</p>
                            <div id="carruselInformatico" class="carousel slide" style="" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carruselInformatico" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Lista camaras"></button>
                                    <button type="button" data-bs-target="#carruselInformatico" data-bs-slide-to="1" aria-label="Camaras"></button>
                                    <button type="button" data-bs-target="#carruselInformatico" data-bs-slide-to="2" aria-label="Monitoreo camaras"></button>
                                    <button type="button" data-bs-target="#carruselInformatico" data-bs-slide-to="3" aria-label="Alarmas"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/inicio/info1.jpg" class="d-block w-100" alt="..."></img>
                                        <div class ="carousel-caption d-none d-md-block">
                                        <h3 class="text-carrusel">Mantención de computadores</h3>
                                        <h4 class="text-carrusel">Realizamos mantención de hardware y software a computadores de escritorio y notebooks</h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/inicio/info2.jpeg" class="d-block w-100" alt="..."></img>
                                        <div class ="carousel-caption d-none d-md-block">
                                        <h3 class="text-carrusel">Formateos de computadores</h3>
                                        <h4 class="text-carrusel">Realizamos formateo de computadores e instalación de software necesario con activación para su uso diario</h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/inicio/info3.jpg" class="d-block w-100" alt="..."></img>
                                        <div class ="carousel-caption d-none d-md-block">
                                        <h3 class="text-carrusel">Instalación y mantención de redes</h3>
                                        <h4 class="text-carrusel">Realizamos instalaciones de redes de internet y telefonía para su casa o negocio para que sus equipos estén conectados.</h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/inicio/info4.jpg" class="d-block w-100" alt="..."></img>
                                        <div class ="carousel-caption d-none d-md-block">
                                        <h3 class="text-carrusel">Servicios informáticos a empresas</h3>
                                        <h4 class="text-carrusel">Realizamos servicios de rollout y mantención de equipos como computadores e impresoras a empresas.</h4>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carruselInformatico" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carruselInformatico" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed cabecera-acordeon" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Servicios eléctricos
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse cuerpo-acordeon" aria-labelledby="headingThree" data-bs-parent="#acordeonServicios">
                        <div class="accordion-body">
                           <p>Realizamos instalación y mantención de redes electricas a domicilio</p>
                           <div id="carruselElectrico" class="carousel slide" style="" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carruselElectrico" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Lista camaras"></button>
                                <button type="button" data-bs-target="#carruselElectrico" data-bs-slide-to="1" aria-label="Camaras"></button>
                                <button type="button" data-bs-target="#carruselElectrico" data-bs-slide-to="2" aria-label="Monitoreo camaras"></button>
                                <button type="button" data-bs-target="#carruselElectrico" data-bs-slide-to="3" aria-label="Alarmas"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/inicio/ele2.jpg" class="d-block w-100" alt="..."></img>
                                    <div class ="carousel-caption d-none d-md-block">
                                    <h3 class="text-carrusel">Instalación Eléctrica</h3>
                                    <h4 class="text-carrusel">Realizamos cableados desde la red eléctrica a su casa</h4>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/inicio/ele1.jpg" class="d-block w-100" alt="..."></img>
                                    <div class ="carousel-caption d-none d-md-block">
                                    <h3 class="text-carrusel">Instalación de luz</h3>
                                    <h4 class="text-carrusel">Instalamos iluminación eléctrica en los lugares que lo requieran.</h4>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/inicio/ele3.jpeg" class="d-block w-100" alt="..."></img>
                                    <div class ="carousel-caption d-none d-md-block">
                                    <h3 class="text-carrusel">¿Está construyendo o remodelando su casa?</h3>
                                    <h4 class="text-carrusel">Nosotros lo ayudamos con la instalación de enchufes e interruptores de luz</h4>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/inicio/ele4.jpeg" class="d-block w-100" alt="..."></img>
                                    <div class ="carousel-caption d-none d-md-block">
                                    <h3 class="text-carrusel">Confíe en nosotros</h3>
                                    <h4 class="text-carrusel">Contamos con profesionales dedicados al área de la electricidad y las herramientas necesarias para ejecutar su requerimiento.</h4>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carruselElectrico" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carruselElectrico" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                        </div>
                      </div>
                    </div>

                  </div>

            </div>
        </div>




        <div class="container px-4 px-lg-5">
            <h1 class="" id="scrollContacto">Contáctenos</h1>
            <p style="font-size: medium">Puedes encontrarnos en nuestras redes sociales:</p>
            <a href="https://www.facebook.com/hp.compaq.7146" class="text-dark text-left link-rrss"> <i class="bi bi-facebook"></i> Facebook: EZsolutions Infor</a>
            <div>
                <br>
                <p class="text-dark text-left link-rrss"> <i class="bi bi-whatsapp"></i> Whatsapp: +56987339973</p>
            </div>

            <a href="mailto: soporte@ezsolutions.cl" class="text-dark text-left link-rrss"> <i class="bi bi-envelope"></i> Correo electronico: soporte@ezsolutions.cl</a>
        </div>



        <footer class="py-5 pie-pagina">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">EZ Solutions 2022</p></div>
        </footer>
    </div>

 </body>
 </html>

