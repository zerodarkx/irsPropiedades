<?php

$opc = $_POST['opc'];

switch ($opc) {
    case '1': //cambiar contraseña del perfil del cliente
        $data_password = array(
            "password_usuario"  => addslashes($_POST['password']),
            "id_usuario"        => $_SESSION['id_usuario']
        );

        $password_controller = new PropiedadController();
        $password           = $password_controller->changePassword($data_password);

        $resultado = ($password)
            ? array(
                "val" => true,
                "tit" => "Exito",
                "mes" => "Contraseña Cambiada Con Exito",
                "ico" => "success"
            )
            : array(
                "val" => false,
                "tit" => "Error",
                "mes" => "No se pudo Cambiar el Password \n" .__FILE__ . " " . __LINE__ ,
                "ico" => "error"
            );


        echo json_encode($resultado);
        break;

    case '2': //agregar un nuevo usuario al sistema en estado no validado

        $user = substr(addslashes($_POST['nom_com']), 0, 1);
        $user.= addslashes($_POST['apellido_paterno']);

        $data_registro = array(
            "nom_com"       => addslashes($_POST['nom_com']).' '.addslashes($_POST['apellido_paterno']).' '.addslashes($_POST['apellido_materno']),
            "rut_usu"       => addslashes($_POST['rut_usu']),
            "tel_usu"       => addslashes($_POST['tel_usu']),
            "correo_usu"    => addslashes($_POST['correo_usu']),
            "pass_usu"      => addslashes($_POST['pass_usu']),
            "user"          => $user
        );

        $propiedad_controller = new PropiedadController();
        $propiedad = $propiedad_controller->setRegistroUsuario($data_registro);

        if ($propiedad) {
            $correo_controller = new EnviarCorreo();

            $data_correo = array(
                "correo_cliente"=> addslashes($_POST['correo_usu']),
                "asunto_correo" => "Bienvenido al Sistema Irs Propiedades",
                "cuerpo_correo" => "
                    <p>Estimado(a),</p>
                    <p>Bienvenidos a nuestro sistema de Propiedades, pronto un ejecutivo se pondra en contacto con usted para verificar la información.</p>
                    <table width='100%'>
                        <tr>
                            <td width='10%'>Usuario:</td>
                            <td>".$user."</td>
                        </tr>
                        <tr>
                            <td>Contraseña:</td>
                            <td>".addslashes($_POST['pass_usu'])."</td>
                        </tr>
                    </table>
                    <p></p>
                    <p>Saludos Cordiales</p>
                    <p>Equipo de Irs Propiedades</p>
                    <img src='cid:logo_irsPropiedades'>
                    "
            );

            $correo_controller->sendMail($data_correo);

            $resultado = array(
                "val" => true,
                "tit" => "Exito",
                "mes" => "Se ha creado el usuario correctamente, favor revisar su correo",
                "ico" => "success"
            );
        }else{
            $resultado = array(
                "val" => false,
                "tit" => "Error",
                "mes" => "No se pudo crear el Usuario \n" .__FILE__ . " " . __LINE__ ,
                "ico" => "error"
            );
        }



        echo json_encode($resultado);
        break;
    
    default:
        # code...
        break;
}