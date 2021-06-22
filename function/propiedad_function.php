<?php

$opcion = $_POST['opc'];

switch ($opcion) {
    case '1': //rellenar tipo propiedad
        $propiedad_controller   = new PropiedadController();
        $pais                   = $propiedad_controller->getTipoPropiedad();

		$select = '<option value="" selected="">Seleccione...</option>';

		foreach ($pais as $key => $value) {
			$select.='<option value="'.$value['id_propiedad'].'">'.$value['nombre_propiedad'].'</option>';
		}

        echo $select;
        break;

    default:
        echo "no llame a nada";
        break;
}