<?php

$opc = $_POST['opc'];

switch ($opc) {
    case '1':
        $data_propiedad = array(
            "rut_pro"           => addslashes($_POST['rut_pro']),
            "nom_pro"           => addslashes($_POST['nom_pro']),
            "correo_pro"        => addslashes($_POST['correo_pro']),
            "cod_tel"           => addslashes($_POST['cod_tel']),
            "telefono"          => addslashes($_POST['telefono']),
            "direccion"         => addslashes($_POST['direccion']),
            "propiedad"         => addslashes($_POST['propiedad']),
            "comuna"            => addslashes($_POST['comuna']),
            "valorVenta"        => addslashes($_POST['valorVenta']),
            "m_terreno"         => addslashes($_POST['m_terreno']),
            "m_construidos"     => addslashes($_POST['m_construidos']),
            "rol_pro"           => addslashes($_POST['rol_pro']),
            "obs"               => addslashes($_POST['obs']),
            "banos"             => addslashes($_POST['banos']),
            "estacionamiento"   => addslashes($_POST['estacionamiento']),
            "dormitorio"        => addslashes($_POST['dormitorios']),
            "bodega"            => addslashes($_POST['bodega'])
        );

        $propiedad_controller   = new PropiedadController();
        $propiedad              = $propiedad_controller->set($data_propiedad);

        $resultado = ($propiedad)
            ? array(
                "val" => true,
                "tit" => "Exito",
                "mes" => "En Breve un Ejecutivo se pondra en contacto con usted",
                "ico" => "success"
            )
            : array(
                "val" => false,
                "tit" => "Error",
                "mes" => "No se pudo agregar Canal de Contacto \n" .__FILE__ . " " . __LINE__ ,
                "ico" => "error"
            );

        echo json_encode($resultado);
        break;

    case '2': // listado de codigos telefonicos
        $codigo_telefonico = New PropiedadController();
        $codigo             = $codigo_telefonico->getCodigoTelefonico();
        $select = '<option value="">Seleccione...</option>';
        foreach ($codigo as $key => $value) {
            $select.='<option value="'.$value['id'].'">'.$value['codigo'].'</option>';
        }

        echo $select;
        # code...
        break;
    
    default:
        # code...
        break;
}