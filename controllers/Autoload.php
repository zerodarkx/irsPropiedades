<?php 

class Autoload
{
	public function __construct()
	{
		spl_autoload_register(function($class_name){
			$modelo		= './models/' . $class_name . '.php';
			$controller	= './controllers/' . $class_name . '.php';

			if(file_exists($modelo)) require_once($modelo);				
			if(file_exists($controller)) require_once($controller);

		});
	}

	public function __destruct(){
		$this;
	}
}


