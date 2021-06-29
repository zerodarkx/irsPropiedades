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

    <div id="loaders" class="loader d-none" style="text-align: center; margin-top: 300px;">
        <img src="./public/img/loading.gif" alt="">
        <h3>Cargando Favor Espere</h3>
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
    <script src="./public/js/sweetAlert/sweetalert.min.js"></script>
    <script type="text/javascript">
        var cargando = document.getElementById("loaders");
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

<?php

    $footer = isset($footer) ? $footer : '';
    $version = '1.0';
    switch ($footer) {
        case 'index':
            echo '
                <script src="./public/js/scripts.js"></script>
            ';
            break;

        case 'buscador':
            echo '
                <script src="./public/js/buscador.js"></script>
            ';
            break;

        case 'ingresar':
            echo '
                <script src="./public/js/jquery-validation/jquery.validate.min.js"></script>
                <script src="./public./js/ingresar.js?version='.$version.'"></script>
            ';
            break;

        case 'detallePropiedad':
            echo '
                <script src="./public/js/detallePropiedad.js?version='.$version.'"></script>
            ';
            break;
        
        default:
            # code...
            break;
    }

?>

</body>

</html>