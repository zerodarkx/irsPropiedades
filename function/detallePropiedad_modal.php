<?php

$opc = $_POST['opc'];

switch ($opc) {
    case '1':
        $id_propiedad = $_POST['id_propiedad'];

        $propiedad_controller   = new PropiedadController();
        $detalle_controller     = new PropiedadController();
        $imagen_controller      = new ImagenController();

        $propiedad              = $propiedad_controller->get($id_propiedad);
        $detalle                = $detalle_controller->getDetallePropiedad($id_propiedad);
        $imagen                 = $imagen_controller->getImagenesPorPropiedad($id_propiedad);

        $encabezado             = (isset($detalle[0]['encabezado']))
                                    ? $detalle[0]['encabezado'] 
                                    : $propiedad[0]['propiedad'].', '.$propiedad[0]['comuna'].', '.$propiedad[0]['region'];
        $descripcion            = (isset($detalle[0]['desc_general'])) ? str_replace(PHP_EOL, '<p>', $detalle[0]['desc_general']) : 'Sin Descripción';
        $zona                   = (isset($detalle[0]['desc_zona'])) ? str_replace(PHP_EOL, '<p>', $detalle[0]['desc_zona']) : 'Sin Descripción';
        $direccion              = (isset($detalle[0]['direccion'])) ? $detalle[0]['direccion'] : 'Sin Dirección';
        $cant_pisos             = (isset($detalle[0]['cant_pisos'])) ? $detalle[0]['cant_pisos'] : 0;

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
                                    <img class="d-block w-100 imagenCaruselLargo" src="'.$path.'" alt="slide">
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
                            <a id="siguiente_prueba" class="carousel-control-next" href="#carusel-imagenes" role="button" data-slide="next">
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
                                <td class="table-secondary">'.$propiedad[0]['m_terreno'].' m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td class="table-active">Superficie útil</td>
                                <td class="table-secondary">'.$propiedad[0]['m_contruidos'].' m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td class="table-active">Dormitorios</td>
                                <td class="table-secondary">'.$propiedad[0]['dormitorio'].'</td>
                            </tr>
                            <tr>
                                <td class="table-active">Baños</td>
                                <td class="table-secondary">'.$propiedad[0]['banos'].'</td>
                            </tr>
                            <tr>
                                <td class="table-active">Estacionamientos</td>
                                <td class="table-secondary">'.$propiedad[0]['estacionamiento'].'</td>
                            </tr>
                            <tr>
                                <td class="table-active">Cantidad de pisos</td>
                                <td class="table-secondary">'.$cant_pisos.'</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3>Dirección Aproximada de Propiedad</h3>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <p>'.$direccion.'</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3>Descripción de la Propiedad</h3>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <p>'.$descripcion.'</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3>Descripción de la Ubicación</h3>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <p>'.$zona.'</p>
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
                    <div class="col-md-6">
                        <label for="">Rut</label>
                        <input type="text" name="rut_cliente" id="rut_cliente" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Correo</label>
                        <input type="text" name="correo_cliente" id="correo_cliente" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Teléfono</label>
                        <input type="text" name="telefono_cliente" id="telefono_cliente" class="form-control" required>
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
                                <h5 class="card-title">'.$encabezado.'</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Publicado hace '.$propiedad[0]['p'].' dias</h6>
                                <h3 class="card-text">Valor Venta '.number_format($propiedad[0]['valorPropiedad'], 0, ',', '.').' UF</h3>
                                <table>
                                    <tr>
                                        <td width="30px"><i class="fa fa-home" aria-hidden="true"></i></td>
                                        <td>'.$propiedad[0]['m_contruidos'].' m<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-bed" aria-hidden="true"></i></td>
                                        <td>'.$propiedad[0]['dormitorio'].'</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-bath" aria-hidden="true"></i></td>
                                        <td>'.$propiedad[0]['banos'].'</td>
                                    </tr>
                                </table>
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