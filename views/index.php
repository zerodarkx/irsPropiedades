<?php
    $footer = "index";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>IRS Propiedades</title>
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/jpg" href="./public/img/IRS1.png"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./public/css/styles.css" rel="stylesheet" />

</head>

<body id="page-top">
    <!-- Navigation-->
    <section>
        <nav class="navbar navbar-expand-lg bg-irsPropiedades text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" style="width: 35%;" href="/">
                    <img src="./public/img/irsPropiedadesLogo.png" alt="" class="logoInicio" style="width: 30%; height: 80px;">
                </a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                    aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="#page-top">Inicio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#buscador">Buscador</a></li>
                        <!--
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#buscadorSubasta">Subastas</a></li>-->
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#destacados">Destacados</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="/ingresar">Ingresar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="#contact">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section class="mt-4 inicioImagenes">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./public/img/inicio_1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./public/img/inicio_2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./public/img/inicio_3.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./public/img/inicio_4.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section class="page-section" id="buscador">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Propiedades a la Venta</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <form action="/buscador" method="post">
            <input type="hidden" name="action" value="1">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Tipo Propiedad</label>
                    <select name="propiedad" id="propiedad" class="custom-select">
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Pais</label>
                    <select name="pais" id="pais" onchange="selectRegion(this.value)" class="custom-select">
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Región</label>
                    <select name="region" id="region" onchange="selectComuna(this.value)" class="custom-select">
                        <option value="">Seleccione Pais</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Comuna</label>
                    <select name="comuna" id="comuna" class="custom-select">
                        <option value="">Seleccione Región</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label for="">Dormitorios</label>
                    <input type="text" name="dormitorio" id="dormitorio" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Baños</label>
                    <input type="text" name="banos" id="banos" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Estacionamientos</label>
                    <input type="text" name="estacionamiento" id="estacionamiento" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Bodegas</label>
                    <input type="text" name="bodega" id="bodega" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 align-self-end">
                    <button class="btn btn-success w-100">Buscar</button>
                </div>
            </div>
            </form>
        </div>
    </section>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="destacados">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Propiedades Destacadas</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div id="cuerpoDestacado" class="row justify-content-center">
                <!-- Portfolio Item 1-->
                
            </div>
        </div>
    </section>
    <!--
    <section class="page-section" id="buscadorSubasta">
        <div class="container">
        
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Propiedades en Subasta</h2>
        
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <form action="/subastas" method="post">
            <input type="hidden" name="action" value="1">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Tipo Propiedad</label>
                    <select name="propiedad_subasta>" id="propiedad_subasta" class="custom-select">
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Pais</label>
                    <select name="pais_subasta" id="pais_subasta" onchange="selectRegion(this.value)" class="custom-select">
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Región</label>
                    <select name="region_subasta" id="region_subasta" onchange="selectComuna(this.value)" class="custom-select">
                        <option value="">Seleccione Pais</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Comuna</label>
                    <select name="comuna_subasta" id="comuna_subasta" class="custom-select">
                        <option value="">Seleccione Región</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label for="">Dormitorios</label>
                    <input type="text" name="dormitorio_subasta" id="dormitorio_subasta" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Baños</label>
                    <input type="text" name="banos_subasta" id="banos_subasta" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Estacionamientos</label>
                    <input type="text" name="estacionamiento_subasta" id="estacionamiento_subasta" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Bodegas</label>
                    <input type="text" name="bodega_subasta" id="bodega_subasta" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 align-self-end">
                    <button class="btn btn-success w-100">Buscar</button>
                </div>
            </div>
            </form>
        </div>
    </section>
    
    <section class="page-section portfolio" id="destacadosSubasta">
        <div class="container">
        
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Subastas Destacadas</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        
            <div id="cuerpoDestacadoSubasta" class="row justify-content-center">
                
            </div>
        </div>
    </section>
    -->
    <!-- Contact Section-->
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contactanos</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <form>
                        <div class="form-floating">
                            <input class="form-control" id="inputName" type="text" placeholder="Ingrese su nombre" />
                            <label for="inputName">Nombre</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="inputEmail" type="email"
                                placeholder="ingrese su Correo..." />
                            <label for="inputEmail">Correo</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="inputPhone" type="tel"
                                placeholder="Ingrese su Numero de Contacto" />
                            <label for="inputPhone">Numero Telefonico</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="inputMessage" placeholder="Ingrese su Consulta"
                                style="height: 12rem"></textarea>
                            <label for="inputMessage">Consulta</label>
                        </div>
                        <br />
                        <button class="btn btn-primary btn-xl" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--form extras -->
    <form id="detallePropiedad" action="./detallePropiedad" method="post">
        <input type="hidden" id="opc" name="opc">
        <input type="hidden" id="detatllepropiedad" name="propiedad">
    </form>
    