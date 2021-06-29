<?php

class ViewController
{
	private static $view_path = './views/';	

	public function load_view( $vista ){
		require_once self::$view_path . $vista . '.php';
		require_once self::$view_path . 'nav/footer.php';
	}

	public function __destruct(){
		$this;
	}
}

?>
