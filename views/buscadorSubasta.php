<?php
    $action             = (isset($_POST['action'])) ? $_POST['action'] : 0;
    $propiedad          = (isset($_POST['propiedad_subasta'])) ? $_POST['propiedad_subasta'] : '';
    $pais               = (isset($_POST['pais_subasta'])) ? $_POST['pais_subasta'] : '';
    $region             = (isset($_POST['region_subasta'])) ? $_POST['region_subasta'] : '';
    $comuna             = (isset($_POST['comuna_subasta'])) ? $_POST['comuna_subasta'] : '';
    $dormitorio         = (isset($_POST['dormitorio_subasta'])) ? $_POST['dormitorio_subasta'] : '';
    $banos              = (isset($_POST['banos_subasta'])) ? $_POST['banos_subasta'] : '';
    $estacionamiento    = (isset($_POST['estacionamiento_subasta'])) ? $_POST['estacionamiento_subasta'] : '';
    $bodega             = (isset($_POST['bodega_subasta'])) ? $_POST['bodega_subasta'] : '';
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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/subastas">Subastas</a></li>
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
            <input type="hidden" id="action" value="<?=$action?>">
            <input type="hidden" id="propiedad_action" value="<?=$propiedad?>">
            <input type="hidden" id="pais_action" value="<?=$pais?>">
            <input type="hidden" id="region_action" value="<?=$region?>">
            <input type="hidden" id="comuna_action" value="<?=$comuna?>">
            <input type="hidden" id="dormitorio_action" value="<?=$dormitorio?>">
            <input type="hidden" id="banos_action" value="<?=$banos?>">
            <input type="hidden" id="estacionamiento_action" value="<?=$estacionamiento?>">
            <input type="hidden" id="bodega_action" value="<?=$bodega?>">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mt-4">Propiedades Subastas</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <form id="form-buscador" method="post" onsubmit="return false">
            <input type="hidden" name="f" value="buscador_modal">
            <input type="hidden" name="opc" value="4">
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
            <div class="row mt-2 justify-content-center">
                <div class="col-md-2">
                    <label for="">Dormitorios</label>
                    <select name="dormitorio" id="dormitorio" class="custom-select">
                        <option value="">Seleccione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value=">3">3 o mas</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Baños</label>
                    <select name="banos" id="banos" class="custom-select">
                        <option value="">Seleccione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value=">3">3 o mas</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Estacionamientos</label>
                    <select name="estacionamiento" id="estacionamiento" class="custom-select">
                        <option value="">Seleccione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value=">3">3 o mas</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Bodegas</label>
                    <select name="bodega" id="bodega" class="custom-select">
                        <option value="">Seleccione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value=">3">3 o mas</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Ordenar</label>
                    <select name="ordenar" id="ordenar" class="custom-select">
                        <option value="ASC">Menor a Mayor</option>
                        <option value="DESC">Mayor a Menor</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 align-self-end">
                    <button class="btn btn-success w-100" onclick="buscadorPropiedades(this.form.id)">Buscar</button>
                </div>
            </div>
            </form>
            <div id="cuerpoBuscador" class="mt-2">
                
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Ubicación</h4>
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
    <!-- Portfolio Modals-->
    <div class="modal fade" id="modalPrincipal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
	</div>

    <div class="modal fade" id="portfolioModal" tabindex="-1">
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
    <!-- Core theme JS-->
    <script src="./public/js/buscadorSubasta.js"></script>
</body>

</html>