<?php

class ImagenController {

    private $model;

	function __construct(){
		$this->model = new Imagen();
    }
    
    public function getImagenFrontis($id_propiedad = ''){
        return $this->model->getImagenFrontis($id_propiedad);
    }

    public function getImagenesPorPropiedad($id_propiedad = ''){
        return $this->model->getImagenesPorPropiedad($id_propiedad);
    }

    public function __destruct(){
		$this;
	}
}