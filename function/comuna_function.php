<?php

$opcion = $_POST['opc'];

switch ($opcion) {
    case '1': //rellenar el pais
        $comuna_controller  = new ComunaController();
        $pais               = $comuna_controller->getPais();

		$select = '<option value="" selected="">Seleccione...</option>';

		foreach ($pais as $key => $value) {
			$select.='<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
		}

        echo $select;
        break;

    case '2': //rellena la region
        $comuna_controller  = new ComunaController();
        $pais               = $comuna_controller->getRegion($_POST['id_pais']);

		$select = '<option value="" selected="">Seleccione...</option>';

		foreach ($pais as $key => $value) {
			$select.='<option value="'.$value['id_region'].'">'.$value['nombre_region'].'</option>';
		}

        echo $select;
        break;
    
    case '3': // rellena la comuna
        $comuna_controller  = new ComunaController();
        $pais               = $comuna_controller->getComuna($_POST['id_region']);

		$select = '<option value="" selected="">Seleccione...</option>';

		foreach ($pais as $key => $value) {
			$select.='<option value="'.$value['id_comuna'].'">'.$value['nombre_comuna'].'</option>';
		}

        echo $select;
        break;

    default:
        echo "no llame a nada";
        break;
}