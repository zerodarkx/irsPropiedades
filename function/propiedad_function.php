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

    case '2': // login para acceder al sistema
        $usuario    = $_POST['usuario'];
        $password   = $_POST['password'];

        $propiedad_controller   = new PropiedadController();
        $propiedad               = $propiedad_controller->loginUsuario($usuario, $password);
        if(count($propiedad) > 0){
            $resultado = true;
            $_SESSION['ok'] = true;
            $_SESSION['id_usuario'] = $propiedad[0]['id_usuario'];
            $_SESSION['nom'] = $propiedad[0]['nombre_usuario'];
        }else{
            $resultado = false;
        }

        echo $resultado;
        break;

    case '3': // ingreso para pujar

        $valor_puja = str_replace('.', '', addslashes($_POST['valor_puja']));

        $data_pujar = array(
            "id_usuario"        => $_SESSION['id_usuario'],
            "id_propiedad"      => addslashes($_POST['id_propiedad']),
            "porcentaje"        => addslashes($_POST['rango_pujar']),
            "valor_antesPuja"   => addslashes($_POST['valor_antesPuja']),
            "valor_conPuja"     => $valor_puja
        );

        $propiedad_controller   = new PropiedadController();
        $propiedad              = $propiedad_controller->setPujaPropiedad($data_pujar);

        $resultado = ($propiedad)
            ? array(
                "val" => true,
                "tit" => "Exito",
                "mes" => "Su acción fue enviado con Exito",
                "ico" => "success"
            )
            : array(
                "val" => false,
                "tit" => "Error",
                "mes" => "No se puedo generar la Puja \n" .__FILE__ . " " .__LINE__ ,
                "ico" => "error"
            );

        echo json_encode($resultado);
        break;

    case '4': //consultas del index
        $correo = new EnviarCorreo();

        $cuerpo_cliente = '
            <p>Estimado(a),</p>
            <p>Gracias por preferir IrsPropiedades, pronto un ejecutivo se pondra en contacto con usted.</p>
            <p>Consulta Realizada : '.$_POST['inputMessage'].'</p>
            <p>Saludos</p>
            <img src="cid:logo_irsPropiedades">
        ';

        $cuerpo_ejecutivo = '
            <p>Estimado(a),</p>
            <p>Un Cliente genero una consulta</p>
            <p>Nombre Cliente: '.$_POST['inputName'].'</p>
            <p>Teléfono: '.$_POST['inputPhone'].'</p>
            <p>Consulta Realizada : '.$_POST['inputMessage'].'</p>
            <p>Saludos</p>
            <img src="cid:logo_irsPropiedades">
        ';

        $correo_cliente = array(
            "correo_cliente"    => $_POST['inputEmail'],
            "asunto_correo"     => 'Consulta IrsPropiedades',
            "cuerpo_correo"     => $cuerpo_cliente
        );

        $correo_ejecutivo = array(
            "correo_cliente"    => 'cponce@irschile.cl',
            "asunto_correo"     => 'Consulta Cliente IrsPropiedades',
            "cuerpo_correo"     => $cuerpo_ejecutivo
        );

        $correo->sendMail($correo_cliente);
        $correo->sendMail($correo_ejecutivo);
        break;

    default:
        echo "no llame a nada";
        break;
}