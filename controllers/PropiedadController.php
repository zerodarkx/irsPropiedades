<?php

class PropiedadController {

    private $model;

	function __construct(){
		$this->model = new Propiedad();
    }

    public function set($data_propiedad = array()){
      return $this->model->set($data_propiedad);
    }

    public function get($id_propiedad){
      return $this->model->get($id_propiedad);
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

    public function setSolicitudPropiedad($data_solicitud = array()){
      return $this->model->setSolicitudPropiedad($data_solicitud);
    }

    public function getDetallePropiedad($id_propiedad = ''){
      return $this->model->getDetallePropiedad($id_propiedad);
    }

    public function loginUsuario($user, $password){
      return $this->model->loginUsuario($user,$password);
    }

    public function setPujaPropiedad($data_puja = array()){
      return $this->model->setPujaPropiedad($data_puja);
    }

    public function getValorPuja($id_propiedad = ''){
      return $this->model->getValorPuja($id_propiedad);
    }

    public function getUsuarioPerfil($id_usuario = ''){
      return $this->model->getUsuarioPerfil($id_usuario);
    }

    public function changePassword($data_password = array()){
      return $this->model->changePassword($data_password);
    }

    public function setRegistroUsuario($data_registro = array()){
      return $this->model->setRegistroUsuario($data_registro);
    }

    public function getPropiedadesSubastadasPorUsuario($id_usuario = ''){
      return $this->model->getPropiedadesSubastadasPorUsuario($id_usuario);
    }

    public function getPropiedadesSubastadasPerdidasPorUsuario($id_usuario = '', $query){
      return $this->model->getPropiedadesSubastadasPerdidasPorUsuario($id_usuario, $query);
    }

    public function __destruct(){
      $this;
    }
}