<?php

class Comuna extends Model{

    public function set(){}
    public function get(){}
    public function del(){}

    public function getPais(){
        $this->query = "SELECT *
                        FROM paises";
        $this->get_query();

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value );
        }
        return $data;
    }

    public function getRegion($id_pais = ''){
        $this->query = "SELECT *
                        FROM regiones
                        WHERE id_pais = $id_pais";
        $this->get_query();

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value );
        }
        return $data;
    }

    public function getComuna($id_region = ''){
        $this->query = "SELECT *
                        FROM comunas
                        WHERE id_region = $id_region";
        $this->get_query();

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value );
        }
        return $data;
    }

    public function __destruct(){
		$this;
	}
    
}

/*foreach ($canal_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO tipo_canal (id_canal, nombre_canal, comision_canal, rentaMensual_canal, det_canalSimulacion)
						VALUES ($id_canal, '$nombre_canal', $comision, $renta_mensual, '$det_canal')";
		$val = $this->set_query();
		return $val;
$this->query = ($id_canal != '')
			?"SELECT id_canal AS id, nombre_canal AS canal, comision_canal AS comision, rentaMensual_canal AS r_mensual, det_canalSimulacion AS det FROM tipo_canal WHERE id_canal = $id_canal"
			:"SELECT id_canal AS id, nombre_canal AS canal, comision_canal AS comision, rentaMensual_canal AS r_mensual, det_canalSimulacion AS det FROM tipo_canal";
		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value );
		}
		return $data;
        */