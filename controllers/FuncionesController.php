<?php

class FuncionesController
{
	public function load_function( $funcion ){
		$function = './function/' . $funcion . '.php';		
		if(file_exists($function)){
			require_once $function;						
		}else{
			echo '<script type="text/javascript">alert("Agregar a que funcion ir");</script>';
		}		
	}

	public function __destruct(){
		$this;
	}
}

?>
