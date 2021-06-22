<?php
require_once('./controllers/Autoload.php');
$autoload 	= new Autoload();

$ruta 		= isset($_GET['r']) ? $_GET['r']: 'proyecto';

//nombre del proyecto para ser mas ordenado
$prueba 	= new Router($ruta);
