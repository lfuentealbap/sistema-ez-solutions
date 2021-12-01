import React from 'react'
import logoEZ from '../../img/logo.png'
import alarma1 from '../../img/alarma.jpg'
import camara1 from '../../img/camaras.jpg'
import formateo1 from '../../img/formateo.jpg'
import './inicio.css'
import 'bootstrap-icons/font/bootstrap-icons.css';



export const Inicio = () => {
    return (
        <div className="fondo-principal">
            {/* Navbar*/}
            <nav className="navbar navbar-expand-lg navbar-dark">
                <div className="container px-5">
                    <a className="navbar-brand logo-inicio" href="#!"> <img src={logoEZ} className="logo-inicio" alt="EZ Solutions"></img> </a>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span className="navbar-toggler-icon"></span></button>
                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li className="nav-item"><a className="nav-link active" aria-current="page" href="#!">Inicio</a></li>
                            <li className="nav-item"><a className="nav-link" href="#scrollContacto">Contacto</a></li>
                            <li className="nav-item"><a className="nav-link" href="#!">Plataforma Técnico</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            {/* Presentacion empresa*/}
            <div className="container px-4 px-lg-5">
                <div className="row gx-4 gx-lg-5 align-items-center my-4">
                    <div className="col-lg-6"><img className="img-fluid rounded mb-4 mb-lg-0 img-presentacion" src={logoEZ} alt="Logo empresa" /></div>
                    <div className="col-lg-4">
                        <h1 className="font-weight-light">EZ Solutions</h1>
                        <p>Somos una empresa dedicada a los servicios de informática y de seguridad. Realizamos instalaciones de cámaras y alarmas, además somos servicio técnico de computadores y realizamos requerimientos técnicos a empresas.</p>
                        
                    </div>
                </div>
            </div>

            {/* Carrusel*/}
            <div id="carouselExampleCaptions" className="carousel slide carrusel" data-bs-ride="carousel">
                <div className="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" className="active" aria-current="true" aria-label="Servicios Informaticos"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Instalacion de alarmas"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Instalacion de Camaras"></button>
                </div>
                <div className="carousel-inner">
                    <div className="carousel-item active">
                        <img src={camara1} className="d-block w-100" alt="..."></img>
                        <div className ="carousel-caption d-none d-md-block">
                        <h5>Instalación de cámaras</h5>
                        <p>Tenga el control de su hogar o comercio con cámaras HD.</p>
                        </div>
                    </div>
                    <div className="carousel-item">
                        <img src={alarma1} className="d-block w-100" alt="..."></img>
                        <div className ="carousel-caption d-none d-md-block">
                        <h5>Instalación de alarmas</h5>
                        <p>Proteja su hogar o local con nuestro sistema de alarmas</p>
                        </div>
                    </div>
                    <div className="carousel-item">
                        <img src={formateo1} className="d-block w-100" alt="..."></img>
                        <div className ="carousel-caption d-none d-md-block">
                        <h5>Servicio Técnico de Computadores</h5>
                        <p>Su computador no está funcionando bien? Contáctenos y se lo arreglamos!</p>
                        </div>
                    </div>
                </div>
                <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span className="visually-hidden">Anterior</span>
                </button>
                <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span className="carousel-control-next-icon" aria-hidden="true"></span>
                    <span className="visually-hidden">Siguiente</span>
                </button>
            </div>

            {/* Contacto*/}
            <div className="container">
                <h1 className="" id="scrollContacto">Contáctenos</h1>
                <p>Puedes encontrarnos en nuestras redes sociales</p>
                <a href="https://www.facebook.com/hp.compaq.7146" className="text-dark text-left link-rrss"> <i className="bi bi-facebook"></i> Facebook</a>
                <span> </span>
                <p className="text-dark text-left link-rrss"> <i className="bi bi-whatsapp"></i> Whatsapp: +56987339973</p>
                <a href="mailto: soporte@ezsolutions.cl" className="text-dark text-left link-rrss"> <i className="bi bi-envelope"></i> Correo electronico: soporte@ezsolutions.cl</a>      
            </div>

            {/*Pie de pagina*/}
            <footer className="py-5 pie-pagina">
                <div className="container px-4 px-lg-5"><p className="m-0 text-center text-white">EZ Solutions 2021</p></div>
            </footer>
        </div>
    )
}