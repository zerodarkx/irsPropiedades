<?php

class Router{
	public $ruta;

	public function __construct( $ruta ){
		if( !isset($_SESSION) )  session_start();

		if(!isset($_SESSION['ok'])) $_SESSION['ok'] = false;

		$controlador = new ViewController();
		
		$this->ruta = isset($_GET['r']) ? $_GET['r']: 'index';
		// DESCOMENTAR SOLO EN CASO DE SE FUERA HACER UNA MANTENCION EN HORARIO DE TRABAJO
		// $this->ruta = ($_SESSION['perfil'] == 1) ? $this->ruta : 'mantencion';

		switch ($this->ruta) {
			case 'index':
				$controlador->load_view( 'index' );
				break;

			case 'funciones':
				$funciones = new FuncionesController();
				$funciones->load_function($_POST['f']);
				break;

			case 'buscador':
				$controlador->load_view( 'buscador' );
				break;

			case 'ingresar':
				$controlador->load_view( 'ingresar' );
				break;

			case 'subastas':
				$controlador->load_view( 'buscadorSubasta' );
				break;

			case 'detallePropiedad':
				$controlador->load_view( 'detallePropiedad' );
				break;

			case 'detallePropiedadFacebook':
				$controlador->load_view( 'externo-detalle' );
				break;

			case 'correo':
				$controlador->load_view( 'prueba' );
				break;

			case 'login':
				$controlador->load_view( 'intranet/login' );
				break;

			case 'intranet':
				if($_SESSION['ok']){
					$controlador->load_view( 'intranet/index' );
				}else{
					header('Location: ./login');
				}
				
				break;

			case 'logout':
				session_destroy();
				header('Location: ./login');
				break;
				
			default:
				$controlador->load_view('error-404');
				break;
		}
	}

	public function __destruct(){
		$this;
	}
}
