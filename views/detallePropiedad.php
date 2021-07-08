<?php
    $footer     = "detallePropiedad";
    $propiedad  = $_POST['propiedad'];
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
                                href="/">Inicio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/buscador">Buscador</a></li>
                        <!--<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/subastas">Subastas</a></li>-->
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/#destacados">Destacados</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="/ingresar">Ingresar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="/#contact">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section class="page-section mt-grande">
        <input type="hidden" id="opc" value="1">
        <input type="hidden" id="propiedad" value="<?=$propiedad?>">
        <div class="container">
            <div id="cuerpoDetalle" class="row">
                
            </div>
        </div>
    </section>
    