<?php
    $footer = "login";
    if ($_SESSION['ok']) {
        header('Location: ./intranet');;
    }
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
    <link rel="shortcut icon" type="image/jpg" href="./public/img/logos/logo_32.jpg"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./public/css/styles.css" rel="stylesheet" />
    <link rel="manifest" href="./manifest.json">

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
                                href="./#page-top">Inicio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="./#buscador">Buscador</a></li>
                        <!--
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#buscadorSubasta">Subastas</a></li>-->
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="./#destacados">Destacados</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="./ingresar">Ingresar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="./#contact">Contacto</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="./login">Acceder</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section class="mt-4" id="buscador" style="padding-top: 6rem; padding-bottom: 12rem;">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Bienvenido al Sistema Irs Propiedades</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <form id="form-acceso" method="post" onsubmit="return false">
                <input type="hidden" name="f" value="propiedad_function">
                <input type="hidden" name="opc" value="2">
                <div class="row justify-content-center">
                    <div class="col-md-5 validar">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control">
                    </div>
                    <div class="col-md-5 validar">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    
                </div>
                <div id="mensaje-login" class="row mt-2 justify-content-center d-none">
                    <div class="col-md-3">
                        <span class="text-danger">Usuario o Contraseña Erronea</span>
                    </div>
                </div>
                <div class="row mt-2 justify-content-center">
                    <div class="col-md-4 align-self-end">
                        <button class="btn btn-success w-100" onclick="validarAcceso(this.form.id)">Acceder</button>
                    </div>
                    <div id="btn-registrar" class="col-md-4">
                        <button class="btn btn-warning btn-block" onclick="registrar()">Registrar</button>
                    </div>
                </div>
            </form>
            
            <div id="registrar" class="d-none">
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Ingrese Datos para Crear Perfil</h3>
                    </div>
                </div>
                <form id="form-ingresoUsuario" method="post" onsubmit="return false">
                <input type="hidden" name="f" value="intranet_function">
                <input type="hidden" name="opc" value="2">
                <div class="form-group row mt-3 justify-content-center">
                    <label for="nom_com" class="col-md-2 col-form-label">Nombre Completo</label>
                    <div class="col-md-3 validar">
                        <input type="text" name="nom_com" id="nom_com" class="form-control">
                    </div>                
                </div>
                <div class="form-group row mt-3 justify-content-center">
                    <label for="apellido_paterno" class="col-md-2 col-form-label">Apellido Paterno</label>
                    <div class="col-md-3 validar">
                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control">
                    </div>                
                </div>
                <div class="form-group row mt-3 justify-content-center">
                    <label for="apellido_materno" class="col-md-2 col-form-label">Apellido Materno</label>
                    <div class="col-md-3 validar">
                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control">
                    </div>                
                </div>
                <div class="form-group row mt-3 justify-content-center">
                    <label for="rut_usu" class="col-md-2 col-form-label">Rut</label>
                    <div class="col-md-3 validar">
                        <input type="text" name="rut_usu" id="rut_usu" onkeyup="formatCliente(this.id)" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-3 justify-content-center">
                    <label for="tel_usu" class="col-md-2 col-form-label">Telefono</label>
                    <div class="col-md-3 validar">
                        <input type="text" name="tel_usu" id="tel_usu" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-3 justify-content-center">
                    <label for="correo_usu" class="col-md-2 col-form-label">Correo</label>
                    <div class="col-md-3 validar">
                        <input type="text" name="correo_usu" id="correo_usu" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-3 justify-content-center">
                    <label for="pass_usu" class="col-md-2 col-form-label">Contraseña</label>
                    <div class="col-md-3 validar">
                        <input type="password" name="pass_usu" id="pass_usu" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-3 justify-content-center">
                    <div class="col-md-3">
                        <button class="btn btn-success btn-block" onclick="validarIngreso(this.form.id)">Crear</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

    

    
   
