<?php

class PropiedadController {

    private $model;

	function __construct(){
		$this->model = new Propiedad();
    }

    public function set($data_propiedad = array()){
      return $this->model->set($data_propiedad);
    }

    public function getTipoPropiedad(){
        return $this->model->getTipoPropiedad();
    }

    public function getBuscadorVenta($data_buscador = array()){
      return $this->model->getBuscadorVenta($data_buscador);
    }

    public function getBuscadorSubasta($data_buscador = array()){
      return $this->model->getBuscadorSubasta($data_buscador);
    }

    public function getCodigoTelefonico(){
      return $this->model->getCodigoTelefonico();
    }

    public function getDestacados(){
      return $this->model->getDestacados();
    }

    public function getDestacadosSubasta(){
      return $this->model->getDestacadosSubasta();
    }

    public function __destruct(){
		$this;
	}
}