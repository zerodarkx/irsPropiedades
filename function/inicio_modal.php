<?php

$opcion = $_POST['opc'];

switch ($opcion) {
    case '1': //detalle del buscador de ventas
        
        //datos a recibir
        $data_buscador = array(
            "id_tipo_propiedad"    => isset($_POST['propiedad']) ? $_POST['propiedad'] : '' ,
            "id_pais"              => isset($_POST['pais']) ? $_POST['pais'] : '' ,
            "id_region"            => isset($_POST['region']) ? $_POST['region'] : '' ,
            "id_comuna"            => isset($_POST['comuna']) ? $_POST['comuna'] : '' 
        );
        

        $buscador_controller    = new PropiedadController();
        $buscador               = $buscador_controller->getBuscadorVenta($data_buscador);

        echo json_encode($buscador);

        break;

    case '2': //destacados
        $propiedades_controller = new PropiedadController();
        $propiedad              = $propiedades_controller->getDestacados();
        $html = '';
        
        for ($i=0; $i < count($propiedad); $i++) {
            $path = (file_exists('https://dsalp.com/public/propiedades/'.$propiedad[$i]['id'].'/')) 
                        ? 'https://dsalp.com/public/propiedades/'.$propiedad[$i]['id'].'/'.$propiedad[$i]['arc']
                        : 'https://dsalp.com/public/img/sin_imagen.jpg';
            $html.= '
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" onclick="detallePropiedad('.$propiedad[$i]['id'].')">
                    <div
                        class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i
                                class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid imagen-modal-buscador" src="'.$path.'" alt="..." />
                </div>
            </div>
            ';    
        }
        echo $html;
        break;

    case '3': //destacados subasta
        $propiedades_controller = new PropiedadController();
        $propiedad              = $propiedades_controller->getDestacadosSubasta();
        $html = '';
        
        if (count($propiedad) > 0) {
            for ($i=0; $i < count($propiedad); $i++) {
                $path = (file_exists('https://dsalp.com/public/propiedades/'.$propiedad[$i]['id'].'/')) 
                        ? 'https://dsalp.com/public/propiedades/'.$propiedad[$i]['id'].'/'.$propiedad[$i]['arc']
                        : 'https://dsalp.com/public/img/sin_imagen.jpg';
                $html.= '
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" onclick="detallePropiedadSubasta('.$propiedad[$i]['id'].')">
                        <div
                            class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid imagen-modal-buscador" src="'.$path.'" alt="..." />
                    </div>
                </div>
                ';    
            }    
        }else{
            $html.='
                <div class="col-md-6">
                    <h3>Aun no tenemos productos en Subasta</h3>
                </div>
            ';
        }
        
        echo $html;
        break;

    default:
        echo "no llame a nada";
        break;
}