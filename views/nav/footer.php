<!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-md-6 align-self-center">
                    <p class="lead mb-0">
                        <i class="fa fa-map"></i> Apoquindo 5583, Oficina 151 Las Condes. Chile
                    </p>
                    <p class="lead mb-0">
                        <i class="fa fa-phone" aria-hidden="true"></i> +562 2929 9138
                    </p>
                    <p class="lead mb-0">
                        <i class="fa fa-envelope" aria-hidden="true"></i> contacto@irspropiedades.com
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.4999596686193!2d-70.57309358480173!3d-33.41020758078543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cede35c05d97%3A0x64b0ea99ddd76277!2sAv.%20Apoquindo%205583%2C%20oficina%20151%2C%20Las%20Condes%2C%20Regi%C3%B3n%20Metropolitana!5e0!3m2!1ses-419!2scl!4v1628175861682!5m2!1ses-419!2scl" class="w-100" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                <script src="./public/js/scripts.js?version='.$version.'"></script>
            ';
            break;

        case 'buscador':
            echo '
                <script src="./public/js/buscador.js?version='.$version.'"></script>
            ';
            break;

        case 'ingresar':
            echo '
                <script src="./public/js/jquery-validation/jquery.validate.min.js"></script>
                <script src="./public/js/ingresar.js?version='.$version.'"></script>
            ';
            break;

        case 'detallePropiedad':
            echo '
                <script src="./public/js/detallePropiedad.js?version='.$version.'"></script>
            ';
            break;

        case 'login':
            echo '
                <script src="./public/js/jquery-validation/jquery.validate.min.js"></script>
                <script src="./public/js/login.js?version='.$version.'"></script>
            ';
            break;
        
        default:
            # code...
            break;
    }

?>

</body>

</html>