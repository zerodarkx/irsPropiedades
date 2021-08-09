<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/jpg" href="./public/img/irsPropiedadesLogo.png" />

    <title>Irs Propiedades</title>

    <!-- Custom fonts for this template-->

    <link href="./public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./public/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Propio -->
    <link href="./public/css/propio.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./intranet">
                <div class="sidebar-brand-icon">
                    <?= $_SESSION['nom'] ?>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" onclick="opciones('home')">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" onclick="opciones('perfil')">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Perfil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="opciones('documentos')">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Documentos</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="./">
                    <i class="fas fa-fw fa-undo"></i>
                    <span>Volver</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow" style="background-color: #4e73df;">
                            <a class="nav-link dropdown-toggle">
                                <img src="http://irsPropiedades/public/img/irsPropiedadesLogo.png" class="w-100 h-100" id="logito">
                            </a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div id="cuerpoDeIntranet" class="card-body">
                            
                        </div>
                    </div>
                    <form id="form-verDetalle" action="./detallePropiedad" method="post">
                        <input type="hidden" name="f" value="detallePropiedad_modal">
                        <input type="hidden" name="opc" value="2">
                        <input type="hidden" id="id_propiedad" name="propiedad">
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; IrsPropiedades</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro de Salir del Sistema?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./logout">Si</a>
                </div>
            </div>
        </div>
    </div>

    <div id="loaders" class="loader d-none" style="text-align: center; margin-top: 300px;">
        <img src="./public/img/loading.gif" alt="">
        <h3>Cargando Favor Espere</h3>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert -->
    <script src="./public/js/sweetAlert/sweetalert.min.js"></script>

    <!-- jquery validator -->
    <script src="./public/js/jquery-validation/jquery.validate.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./public/js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        var cargando = document.getElementById("loaders");

        function reloadPage(url, tmp) {
            setTimeout(function() {
                window.location.href = url
            }, tmp)
        }

        function openModal(url, opc, id) {
            $.post("./funciones", {
                    f: url,
                    opc: opc,
                    id: id
                })
                .done(function(result) {
                    let d = JSON.parse(result);

                    $("#modalPrincipal").html(d['modal']);
                    $("#modalPrincipal").modal('show');


                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    alert('Error!! : ' + jqXHR.status);
                });
        }

        // evento ajax start
        $(document).ajaxStart(function() {
            cargando.classList.toggle("d-none");
            $(".loader").fadeIn("fast");
        });

        // evento ajax stop
        $(document).ajaxStop(function() {
            cargando.classList.toggle("d-none");
            $(".loader").fadeOut("fast");
        });
    </script>
    <script src="./public/js/intranet.js"></script>

</body>

</html>