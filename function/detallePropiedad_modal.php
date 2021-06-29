<?php

$opc = $_POST['opc'];

switch ($opc) {
    case '1':
        $id_propiedad = $_POST['id_propiedad'];
        error_log($id_propiedad);

        $imagen_controller  = new ImagenController();
        $imagen             = $imagen_controller->getImagenesPorPropiedad($id_propiedad);

        $html = '
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carusel-imagenes" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
        ';

        $active = "active";
        foreach ($imagen as $key => $value) {
            $path = 'https://dsalp.com/public/propiedades/'.$id_propiedad.'/'.$value['arc'];
            $html.='
                                <div class="carousel-item '.$active.'">
                                    <img class="d-block w-100" src="'.$path.'" alt="slide">
                                </div>
            ';
            $active = '';
        }
        $html.='
                            </div>
                            <a class="carousel-control-prev" href="#carusel-imagenes" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carusel-imagenes" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3>Caracteristicas</h3>
                    </div>
                    <div class="col-md-12">
                        <table width="50%" class="table table-borderless">
                            <tr>
                                <td width="30%" class="table-active">Superficie total</td>
                                <td class="table-secondary">1 m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td class="table-active">Superficie útil</td>
                                <td class="table-secondary">1 m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td class="table-active">Dormitorios</td>
                                <td class="table-secondary">1</td>
                            </tr>
                            <tr>
                                <td class="table-active">Baños</td>
                                <td class="table-secondary">1</td>
                            </tr>
                            <tr>
                                <td class="table-active">Estacionamientos</td>
                                <td class="table-secondary">1</td>
                            </tr>
                            <tr>
                                <td class="table-active">Cantidad de pisos</td>
                                <td class="table-secondary">1</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3>Contacta al Vendedor</h3>
                    </div>
                </div>
                <form id="form-consulta" method="post" onsubmit="return false">
                <input type="hidden" name="f" value="ingreso_function">
                <input type="hidden" name="opc" value="3">
                <input type="hidden" name="id_propiedad" value="'.$id_propiedad.'">
                <div class="row mt-2">
                    <div class="col-md-4">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Correo</label>
                        <input type="text" name="correo_cliente" id="correo_cliente" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Teléfono</label>
                        <input type="text" name="telefono_cliente" id="telefono_cliente" class="form-control">
                    </div>
                </div>
                <div class="row mt-2" >
                    <div class="col-md-12">
                        <label for="">Mensaje</label>
                        <textarea name="mensaje_cliente" id="mensaje_cliente" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-block" onclick="enviarConsulta(this.form.id)">Enviar Consulta</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Arriendo Casa 3d 1b Rinconada De Maipú / Principio De</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Publicado hace tantos dias</h6>
                                <h3 class="card-text">Valor Venta 5000 UF</h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-bed" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-bath" aria-hidden="true"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Consejos de seguridad</h5>
                                <ul>
                                    <li>
                                        Desde Irspropiedades.com, nunca te pediremos contraseñas, PIN o códigos de verificación a través de WhatsApp, teléfono, SMS o email.
                                    </li>
                                    <li>
                                        Verifica que el inmueble exista y desconfía si te dicen que necesitan vender o arrendar con urgencia.
                                    </li>
                                    <li>
                                        Revisa el remitente de los e-mails para asegurarte que los envía Irspropiedades.com.
                                    </li>
                                    <li>
                                        Solicita la mayor cantidad posible de información sobre el inmueble, así como fotos y/o videos para comprobar su veracidad.
                                    </li>
                                    <li>
                                        Sospecha si el precio te parece demasiado barato como para ser cierto.
                                    </li>
                                    <li>
                                        No uses servicios de pago anónimos para pagar, reservar o adelantar dinero sin haber visto el inmueble.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';

        echo $html;
        break;
    
    default:
        # code...
        break;
}