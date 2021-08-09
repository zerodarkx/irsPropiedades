<?php

$opcion = $_POST['opc'];

switch ($opcion) {
    case '1': //detalle del buscador de ventas
        
        //datos a recibir
        $data_buscador = array(
            "id_tipo_propiedad"     => isset($_POST['propiedad']) ? $_POST['propiedad'] : '' ,
            "id_pais"               => isset($_POST['pais']) ? $_POST['pais'] : '' ,
            "t3.id_region"          => isset($_POST['region']) ? $_POST['region'] : '' ,
            "t2.id_comuna"          => isset($_POST['comuna']) ? $_POST['comuna'] : '',
            "banos"                 => isset($_POST['banos']) ? $_POST['banos'] : '',
            "estacionamiento"       => isset($_POST['estacionamiento']) ? $_POST['estacionamiento'] : '',
            "bodega"                => isset($_POST['bodega']) ? $_POST['bodega'] : '',
            "dormitorio"            => isset($_POST['dormitorio']) ? $_POST['dormitorio'] : '',
            "ordenar"               => $_POST['ordenar']
        );

        $buscador_controller    = new PropiedadController();
        $buscador               = $buscador_controller->getBuscadorVenta($data_buscador);
        
        $html= '
        <div class="row">';
        
        if (count($buscador) > 0) {
         
            foreach ($buscador as $key => $value) {
                $imagen_controllador = new ImagenController();
                $imagen = $imagen_controllador->getImagenFrontis($value['id']);
                if (count($imagen) > 0 && !file_exists('https://dsalp.com/public/propiedades/'.$value['id'].'/')) {
                    $path = 'https://dsalp.com/public/propiedades/'.$value['id'].'/'.$imagen[0]['arc'];
                }else{
                    $path = 'https://dsalp.com/public/img/sin_imagen.jpg';
                }
                
                $html.='
                    <div class="col-md-4 mt-1">
                        <img class="card-img-top mt-2 imagen-buscador" src="'.$path.'" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">'.$value['propiedad'].', '.$value['comuna'].'</h5>
                            <table width="100%">
                                <tr>
                                    <td width="35%">Metros Totales</td>
                                    <td>'.$value['m_terreno'].' m<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Metros Útiles</td>
                                    <td>'.$value['m_contruidos'].' m<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Dirección</td>
                                    <td>'.$value['direccion'].'</td>
                                </tr>
                                <tr>
                                    <td>Valor Propiedad</td>
                                    <td>'.number_format($value['valorPropiedad'], 0, ',' , '.').' UF</td>
                                </tr>
                            </table>
                            <button class="btn btn-success btn-block mt-3" onclick="detallePropiedad('.$value['id'].')">Ver Detalle</button>
                        </div>
                    </div>
                ';
            }
        }else{
            $html.='<h4 class="mt-4">No Existen datos por los filtros indicados</h4>';
        }

        $html.='
        </div>
        ';
        echo ($html);

        break;

    case '2': //recibe los datos del buscador de  venta desde el inicio
        $propiedad_action          = $_POST['propiedad'];
        $pais_action               = $_POST['pais'];
        $region_action             = $_POST['region'];
        $comuna_action             = $_POST['comuna'];

        $propiedad_controller   = new PropiedadController();
        $pais_controller        = new ComunaController();
        $region_controller      = new ComunaController();
        $comuna_controller      = new ComunaController();
        
        $select_propiedad   = '<option value="">Seleccione...</option>';
        $select_pais        = '<option value="">Seleccione...</option>';
        $select_region      = '<option value="">Seleccione...</option>';
        $select_comuna      = '<option value="">Seleccione...</option>';
        
        $propiedad  = $propiedad_controller->getTipoPropiedad($propiedad_action);
        foreach ($propiedad as $key => $value) {
            if ($value['id_propiedad'] == $propiedad_action) {
                $select_propiedad.='
                    <option value="'.$value['id_propiedad'].'" selected>'.$value['nombre_propiedad'].'</option>
                ';
            }else{
                $select_propiedad.='
                    <option value="'.$value['id_propiedad'].'">'.$value['nombre_propiedad'].'</option>
                ';
            }
        }

        $pais   = $pais_controller->getPais();
        foreach ($pais as $key => $value) {
            if ($value['id'] == $pais_action) {
                $select_pais.='
                    <option value="'.$value['id'].'" selected>'.$value['nombre'].'</option>
                ';
            }else{
                $select_pais.='
                    <option value="'.$value['id'].'">'.$value['nombre'].'</option>
                ';
            }
        }

        if($region_action){
            $region = $region_controller->getRegion($pais_action);
            foreach ($region as $key => $value) {
                if ($value['id_region'] == $pais_action) {
                    $select_region.='
                        <option value="'.$value['id_region'].'" selected>'.$value['nombre_region'].'</option>
                    ';
                }else{
                    $select_region.='
                        <option value="'.$value['id_region'].'">'.$value['nombre_region'].'</option>
                    ';
                }
            }
        }

        if($comuna_action){
            $comuna = $comuna_controller->getComuna($region_action);
            foreach ($comuna as $key => $value) {
                if ($value['id_comuna'] == $comuna_action) {
                    $select_comuna.='
                        <option value="'.$value['id_comuna'].'" selected>'.$value['nombre_comuna'].'</option>
                    ';
                }else{
                    $select_comuna.='
                        <option value="'.$value['id_comuna'].'">'.$value['nombre_comuna'].'</option>
                    ';
                }
            }
        }

        echo json_encode(array(
            "propiedad" => $select_propiedad,
            "pais" => $select_pais,
            "region" => $select_region,
            "comuna" => $select_comuna
        ));
        
        break;

    case '3': //detalle de la propiedad
        $id_propiedad = $_POST['id_propiedad'];

        $propiedad_controller   = new PropiedadController();
        $direccion_controller = new PropiedadController();
        $direccion              = $direccion_controller->getDetallePropiedad($id_propiedad);
        $propiedad              = $propiedad_controller->getBuscadorVenta(array("t1.id_propiedad" => $id_propiedad));
        $direccion_parcial      = (count($direccion) > 0) ? $direccion[0]['direccion'] : 'Sin Dirección';
        $imagen_controllador    = new ImagenController();
        $imagen                 = $imagen_controllador->getImagenesPorPropiedad($id_propiedad);
        if (count($imagen) > 0 && !file_exists('https://dsalp.com/public/propiedades/'.$id_propiedad.'/')) {
            $frontis = ($imagen[0]['id_tipo'] == 1) ? 'https://dsalp.com/public/propiedades/'.$id_propiedad.'/'.$imagen[0]['arc'] : 'https://dsalp.com/public/img/mantencion.jpg';
        }else{
            $frontis = 'https://dsalp.com/public/img/sin_imagen.jpg';
        }
        

        $html = ' 
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">'.$propiedad[0]['propiedad'].', '.$propiedad[0]['comuna'].', #'.$id_propiedad.'</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="rounded imagen-principal" src="'.$frontis.'" alt="..." />

                                <div class="row mb-4" style="margin-top:50px;">';
        for ($i=1; $i < count($imagen); $i++) {
            $path = 'https://dsalp.com/public/propiedades/'.$id_propiedad.'/'.$imagen[$i]['arc'];
            $html.='
                                    <div class="col-md-6">
                                        <img class="imagen-modal-buscador rounded" src="'.$path.'" alt="..." />
                                    </div>
            ';
        }
                                

        $html.='
                                </div>

                                <!-- Portfolio Modal - Text-->
                                <table width="100%">
                                    <tr>
                                        <td width="20%" class="textoIzquirda">Metros Totales</td>
                                        <td width="40%" class="textoIzquirda">'.$propiedad[0]['m_terreno'].' m<sup>2</sup></td>
                                        <td width="20%" class="textoIzquirda">Dormitorios</td>
                                        <td width="20%" class="textoIzquirda">'.$propiedad[0]['dormitorio'].'</td>
                                    </tr>
                                    <tr>
                                        <td class="textoIzquirda">Metros Útiles</td>
                                        <td class="textoIzquirda">'.$propiedad[0]['m_contruidos'].' m<sup>2</sup></td>
                                        <td class="textoIzquirda">Estacionamientos</td>
                                        <td class="textoIzquirda">'.$propiedad[0]['estacionamiento'].'</td>
                                    </tr>
                                    <tr>
                                        <td class="textoIzquirda">Dirección</td>
                                        <td class="textoIzquirda">'.$direccion_parcial.'</td>
                                        <td class="textoIzquirda">Baños</td>
                                        <td class="textoIzquirda">'.$propiedad[0]['banos'].'</td>
                                    </tr>
                                    <tr>
                                        <td class="textoIzquirda">Valor Propiedad (UF)</td>
                                        <td class="textoIzquirda">'.number_format($propiedad[0]['valorPropiedad'], 0, ',' , '.').'</td>
                                        <td class="textoIzquirda">Bodegas</td>
                                        <td class="textoIzquirda">'.$propiedad[0]['bodega'].'</td>
                                    </tr>
                                </table>
                                <div class="modal-footer mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-success" onclick="reservar('.$id_propiedad.')">Mas Detalles</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        
        echo $html;
        break;

    case '4': //detalle del buscador de subasta
    
        //datos a recibir
        $data_buscador = array(
            "id_tipo_propiedad"     => isset($_POST['propiedad']) ? $_POST['propiedad'] : '' ,
            "id_pais"               => isset($_POST['pais']) ? $_POST['pais'] : '' ,
            "t3.id_region"          => isset($_POST['region']) ? $_POST['region'] : '' ,
            "t2.id_comuna"          => isset($_POST['comuna']) ? $_POST['comuna'] : '',
            "banos"                 => isset($_POST['banos']) ? $_POST['banos'] : '',
            "estacionamiento"       => isset($_POST['estacionamiento']) ? $_POST['estacionamiento'] : '',
            "bodega"                => isset($_POST['bodega']) ? $_POST['bodega'] : '',
            "dormitorio"            => isset($_POST['dormitorio']) ? $_POST['dormitorio'] : '',
            "ordenar"               => $_POST['ordenar']
        );

        $buscador_controller    = new PropiedadController();
        $buscador               = $buscador_controller->getBuscadorSubasta($data_buscador);
        
        $html= '
        <div class="row">';
        
        if (count($buscador) > 0) {
            
            foreach ($buscador as $key => $value) {
                $imagen_controllador = new ImagenController();
                $imagen = $imagen_controllador->getImagenFrontis($value['id']);
                if (count($imagen) > 0 && !file_exists('https://dsalp.com/public/propiedades/'.$value['id'].'/')) {
                    $path = 'https://dsalp.com/public/propiedades/'.$value['id'].'/'.$imagen[0]['arc'];
                }else{
                    $path = 'https://dsalp.com/public/img/sin_imagen.jpg';
                }
                
                $html.='
                    <div class="col-md-4 card mt-1 ml-1">
                        <img class="card-img-top mt-2 imagen-buscador" src="'.$path.'" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">'.$value['propiedad'].', '.$value['comuna'].'</h5>
                            <table width="100%">
                                <tr>
                                    <td width="50%">Metros Totales</td>
                                    <td>'.$value['m_terreno'].' m<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Metros Útiles</td>
                                    <td>'.$value['m_contruidos'].' m<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Dirección</td>
                                    <td>'.$value['direccion'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Valor Min UF</strong></td>
                                    <td><strong>'.number_format($value['valorPropiedad'], 0, ',' , '.').'</strong></td>
                                </tr>
                            </table>
                            <button class="btn btn-success btn-block" onclick="detallePropiedad('.$value['id'].')">Ver Detalle</button>
                        </div>
                    </div>
                ';
            }
        }else{
            $html.='<h4 class="mt-4">No Existen datos por los filtros indicados</h4>';
        }

        $html.='
        </div>
        ';
        echo ($html);

        break;

    case '5': //detalle de la propiedad subasta
        $id_propiedad = $_POST['id_propiedad'];

        $propiedad_controller   = new PropiedadController();
        $direccion_controller   = new PropiedadController();
        $propiedad              = $propiedad_controller->getBuscadorSubasta(array("t1.id_propiedad" => $id_propiedad));
        $direccion              = $direccion_controller->getDetallePropiedad($id_propiedad);
        $direccion_parcial      = (count($direccion) > 0) ? $direccion[0]['direccion'] : 'Sin Dirección';
        $imagen_controllador    = new ImagenController();
        $imagen                 = $imagen_controllador->getImagenesPorPropiedad($id_propiedad);
        if (count($imagen) > 0 && !file_exists('https://dsalp.com/public/propiedades/'.$id_propiedad.'/')) {
            $frontis = ($imagen[0]['id_tipo'] == 1) ? 'https://dsalp.com/public/propiedades/'.$id_propiedad.'/'.$imagen[0]['arc'] : 'https://dsalp.com/public/img/mantencion.jpg';
        }else{
            $frontis = 'https://dsalp.com/public/img/sin_imagen.jpg';
        }
        

        $html = ' 
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">'.$propiedad[0]['propiedad'].', '.$propiedad[0]['comuna'].', #'.$id_propiedad.'</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="imagen-modal-buscador rounded" src="'.$frontis.'" alt="..." />

                                <div class="row mb-4">';
        for ($i=1; $i < count($imagen); $i++) {
            $path = 'https://dsalp.com/public/propiedades/'.$id_propiedad.'/'.$imagen[$i]['arc'];
            $html.='
                                    <div class="col-md-6">
                                        <img class="imagen-modal-buscador rounded" src="'.$path.'" alt="..." />
                                    </div>
            ';
        }
                                

        $html.='
                                </div>

                                <!-- Portfolio Modal - Text-->
                                <table width="100%">
                                    <tr>
                                        <td width="30%" class="textoIzquirda">Metros Totales</td>
                                        <td width="20%" class="textoIzquirda">'.number_format($propiedad[0]['m_terreno'], 0, ',', '.').' m<sup>2</sup></td>
                                        <td width="30%" class="textoIzquirda">Dormitorios</td>
                                        <td width="20%" class="textoIzquirda">'.$propiedad[0]['dormitorio'].'</td>
                                    </tr>
                                    <tr>
                                        <td class="textoIzquirda">Metros Útiles</td>
                                        <td class="textoIzquirda">'.number_format($propiedad[0]['m_contruidos'], 0, ',', '.').' m<sup>2</sup></td>
                                        <td class="textoIzquirda">Estacionamientos</td>
                                        <td class="textoIzquirda">'.$propiedad[0]['estacionamiento'].'</td>
                                    </tr>
                                    <tr>
                                        <td class="textoIzquirda">Dirección</td>
                                        <td class="textoIzquirda">'.$direccion_parcial.'</td>
                                        <td class="textoIzquirda">Baños</td>
                                        <td class="textoIzquirda">'.$propiedad[0]['banos'].'</td>
                                    </tr>
                                    <tr>
                                        <td class="textoIzquirda">Valor Propiedad (UF)</td>
                                        <td class="textoIzquirda">'.number_format($propiedad[0]['valorPropiedad'], 0, ',' , '.').'</td>
                                        <td class="textoIzquirda">Bodegas</td>
                                        <td class="textoIzquirda">'.$propiedad[0]['bodega'].'</td>
                                    </tr>
                                </table>
                                <div class="modal-footer mt-3">
                                    <button class="btn btn-success" onclick="reservar('.$id_propiedad.')">Mas Detalles</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        
        echo $html;
        break;

    default:
        echo "no llame a nada";
        break;
}