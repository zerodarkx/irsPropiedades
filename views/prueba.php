<?php

$enviarCorreo_controller = new EnviarCorreo();
$enviarCorreo_controller->sendNotificacion(array(
    "asunto_correo" => "prueba",
    "cuerpo_correo" => "prueba"
));