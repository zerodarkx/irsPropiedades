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
                    <img src="./public/img/irsPropiedadesLogo.png" alt="" style="width: 50%; height: 50px;">
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
    <section class="page-section mt-4" id="buscador">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ingrese Datos de Propiedad</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <form id="form-ingreso" method="post" onsubmit="return false">
            <input type="hidden" name="f" value="ingreso_function">
            <input type="hidden" name="opc" value="1">
            <div class="row">
                <div class="col-md-3 validar">
                    <label for="">Rut Propietario</label>
                    <input type="text" name="rut_pro" id="rut_pro" class="form-control" onkeyup="formatCliente(this.id)">
                </div>
                <div class="col-md-6 validar">
                    <label for="">Nombre Propietario</label>
                    <input type="text" name="nom_pro" id="nom_pro" class="form-control">
                </div>
                <div class="col-md-3 validar">
                    <label for="">Correo</label>
                    <input type="text" name="correo_pro" id="correo_pro" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3 validar">
                    <label for="">Codigo Telefonico</label>
                    <select name="cod_tel" id="cod_tel" class="custom-select">
                    </select>
                </div>
                <div class="col-md-3 validar">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control">
                </div>
                <div class="col-md-6 validar">
                    <label for="">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3 validar">
                    <label for="">Tipo Propiedad</label>
                    <select name="propiedad" id="propiedad" class="custom-select">
                    </select>
                </div>
                <div class="col-md-3 validar">
                    <label for="">Pais</label>
                    <select name="pais" id="pais" class="custom-select" onchange="selectRegion(this.value)">
                    </select>
                </div>
                <div class="col-md-3 validar">
                    <label for="">Region</label>
                    <select name="region" id="region" onchange="selectComuna(this.value)" class="custom-select">
                        <option value="">Seleccione Región</option>
                    </select>
                </div>
                <div class="col-md-3 validar">
                    <label for="">Comuna</label>
                    <select name="comuna" id="comuna" class="custom-select">
                        <option value="">Seleccione Región</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3 validar">
                    <label for="">Valor Venta UF</label>
                    <input type="text" name="valorVenta" id="valorVenta" class="form-control">
                </div>
                <div class="col-md-3 validar">
                    <label for="">Metros Totales</label>
                    <input type="text" name="m_terreno" id="m_terreno" class="form-control">
                </div>
                <div class="col-md-3 validar">
                    <label for="">Metros Útiles</label>
                    <input type="text" name="m_construidos" id="m_construidos" class="form-control">
                </div>
                <div class="col-md-3 validar">
                    <label for="">ROL</label>
                    <input type="text" name="rol_pro" id="rol_pro" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3 validar">
                    <label for="">Dormitorios</label>
                    <input type="text" name="dormitorios" id="dormitorios" class="form-control">
                </div>
                <div class="col-md-3 validar">
                    <label for="">Bodega</label>
                    <input type="text" name="bodega" id="bodega" class="form-control">
                </div>
                <div class="col-md-3 validar">
                    <label for="">Estacionamiento</label>
                    <input type="text" name="estacionamiento" id="estacionamiento" class="form-control">
                </div>
                <div class="col-md-3 validar">
                    <label for="">Baños</label>
                    <input type="text" name="banos" id="banos" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 validar">
                    <label for="">Observaciones</label>
                    <textarea name="obs" id="obs" rows="2" class="form-control"></textarea>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 validar">
                    <button class="btn btn-success btn-block" onclick="validarIngreso(this.form.id)">Enviar</button>
                </div>
            </div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Ubicacíon</h4>
                    <p class="lead mb-0">
                        Apoquindo 5583, Oficina 151
                        <br />
                        Las Condes. Chile
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">IRS Propiedades</h4>
                    <p class="lead mb-0">
                        
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; IRS Propiedades</small></div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="./public/js/jquery-validation/jquery.validate.min.js"></script>
    <script src="./public/js/sweetAlert/sweetalert.min.js"></script>
    <!-- Core theme JS-->
    <script src="./public./js/ingresar.js"></script>
</body>

</html>