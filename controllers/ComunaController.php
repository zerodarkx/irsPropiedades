<?php

class ComunaController {

    private $model;

	function __construct(){
		$this->model = new Comuna();
    }

    public function getPais(){
        return $this->model->getPais();
    }
    public function getRegion($id_pais = ''){
        return $this->model->getRegion($id_pais);
    }
    public function getComuna($id_region = ''){
        return $this->model->getComuna($id_region);
    }

    public function __destruct(){
		$this;
	}
}