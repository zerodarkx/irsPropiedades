<?php

class Propiedad extends Model{

    public function set($data_propiedad = array()){
      foreach ($data_propiedad as $key => $value) {
        $$key = $value;
      }

      $this->query = "INSERT INTO propiedad (id_ejecutivo, id_cod_telefono, id_comuna, rut_propiedad, nombre_propiedad, correo_propiedad, telefono_propiedad, direccion_propiedad, id_tipo_propiedad, rol_propiedad, valor_propiedad, mTerreno, mConstruidos, observaciones, banos, estacionamiento, dormitorio, bodega)
                        VALUES (1, $cod_tel, $comuna, '$rut_pro', '$nom_pro', '$correo_pro', $telefono, '$direccion', '$propiedad', '$rol_pro', '$valorVenta', '$m_terreno', '$m_construidos', '$obs', $banos, $estacionamiento, $dormitorio, $bodega)";

      $val = $this->set_query();
      return $val;

    }
    public function get(){}
    public function del(){}

    public function getTipoPropiedad(){
      $this->query = "SELECT *
                        FROM tipo_propiedades";
        $this->get_query();

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value );
        }
        return $data;
    }

    public function getBuscadorVenta($data_buscador = array()){
      $where = '';
      foreach ($data_buscador as $key => $value) {
        if ($value) {
          $identificador = substr($value, 0, -1);
          $valor = substr($value, -1);
          if ($key == 'ordenar') {
            $where.="ORDER BY valor_propiedad ".$value;
          }else{
            $where.= ($identificador == '>') ? 'AND '.$key.' >= '. $valor. ' ' : 'AND '.$key.' = '. $value. ' ';
          }
          
        }
      }
      
      $this->query = "SELECT 
                        t1.id_propiedad AS id,
                        t1.id_cliente AS cliente,
                        t1.id_ejecutivo AS id_ejecutivo,
                        t1.id_cod_telefono AS cod_telefono,
                        t1.id_tipo_propiedad AS id_tipo_propiedad,
                        t1.id_comuna AS id_comuna,
                        t1.id_estado AS id_estado,
                        t1.rut_propiedad AS rut,
                        t1.nombre_propiedad AS nombre_propiedad,
                        t1.correo_propiedad AS correo_propiedad,
                        t1.telefono_propiedad AS telefono,
                        t1.direccion_propiedad AS direccion,
                        t1.rol_propiedad AS rol,
                        t1.valor_propiedad AS valorPropiedad,
                        t1.mTerreno AS m_terreno,
                        t1.mConstruidos AS m_contruidos,
                        t1.banos AS banos,
                        t1.dormitorio AS dormitorio,
                        t1.bodega AS bodega,
                        t1.estacionamiento AS estacionamiento,
                        t2.nombre_comuna AS comuna,
                        t3.nombre_region AS region,
                        t3.id_region AS id_region,
                        t4.nombre AS pais,
                        t4.id AS id_pais,
                        t5.nombre_propiedad AS propiedad
                      FROM propiedad AS t1
                      INNER JOIN comunas AS t2 ON (t2.id_comuna = t1.id_comuna)
                      INNER JOIN regiones AS t3 ON (t3.id_region = t2.id_region)
                      INNER JOIN paises AS t4 ON (t4.id = t3.id_pais)
                      INNER JOIN tipo_propiedades AS t5 ON (t5.id_propiedad = t1.id_tipo_propiedad)
                      WHERE id_estado = 2 ".$where;
        $this->get_query();

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value );
        }
        return $data;
    }

    public function getBuscadorSubasta($data_buscador = array()){
      $where = '';
      foreach ($data_buscador as $key => $value) {
        if ($value) {
          $identificador = substr($value, 0, -1);
          $valor = substr($value, -1);
          if ($key == 'ordenar') {
            $where.="ORDER BY valor_propiedad ".$value;
          }else{
            $where.= ($identificador == '>') ? 'AND '.$key.' >= '. $valor. ' ' : 'AND '.$key.' = '. $value. ' ';
          }
          
        }
      }
      
      $this->query = "SELECT 
                        t1.id_propiedad AS id,
                        t1.id_cliente AS cliente,
                        t1.id_ejecutivo AS id_ejecutivo,
                        t1.id_cod_telefono AS cod_telefono,
                        t1.id_tipo_propiedad AS id_tipo_propiedad,
                        t1.id_comuna AS id_comuna,
                        t1.id_estado AS id_estado,
                        t1.rut_propiedad AS rut,
                        t1.nombre_propiedad AS nombre_propiedad,
                        t1.correo_propiedad AS correo_propiedad,
                        t1.telefono_propiedad AS telefono,
                        t1.direccion_propiedad AS direccion,
                        t1.rol_propiedad AS rol,
                        t1.valor_propiedad AS valorPropiedad,
                        t1.mTerreno AS m_terreno,
                        t1.mConstruidos AS m_contruidos,
                        t1.banos AS banos,
                        t1.dormitorio AS dormitorio,
                        t1.bodega AS bodega,
                        t1.estacionamiento AS estacionamiento,
                        t2.nombre_comuna AS comuna,
                        t3.nombre_region AS region,
                        t3.id_region AS id_region,
                        t4.nombre AS pais,
                        t4.id AS id_pais,
                        t5.nombre_propiedad AS propiedad
                      FROM propiedad AS t1
                      INNER JOIN comunas AS t2 ON (t2.id_comuna = t1.id_comuna)
                      INNER JOIN regiones AS t3 ON (t3.id_region = t2.id_region)
                      INNER JOIN paises AS t4 ON (t4.id = t3.id_pais)
                      INNER JOIN tipo_propiedades AS t5 ON (t5.id_propiedad = t1.id_tipo_propiedad)
                      WHERE id_estado = 4 ".$where;
        $this->get_query();

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value );
        }
        return $data;
    }

    public function getCodigoTelefonico(){
      $this->query = "SELECT
                        id_codigo_telefono AS id,
                        cod AS codigo
                      FROM codigos_telefonicos";
        $this->get_query();

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value );
        }
        return $data;
    }

    public function getDestacados(){
      $this->query = "SELECT
                        t1.id_propiedad AS id,
                        t2.nom_imagen AS arc
                      FROM propiedad AS t1
                      INNER JOIN imagenes_propiedad AS t2 ON (t2.id_propiedad = t1.id_propiedad)
                      WHERE t2.id_tipoImagen = 1 AND t1.id_estado  = 2
                      ORDER BY t1.id_propiedad DESC
                      LIMIT 6";
      $this->get_query();

      $data = array();

      foreach ($this->rows as $key => $value) {
      array_push($data, $value );
      }
      return $data;
    }

    public function getDestacadosSubasta(){
      $this->query = "SELECT
                        t1.id_propiedad AS id,
                        t2.nom_imagen AS arc
                      FROM propiedad AS t1
                      INNER JOIN imagenes_propiedad AS t2 ON (t2.id_propiedad = t1.id_propiedad)
                      WHERE t2.id_tipoImagen = 1 AND t1.id_estado = 4
                      ORDER BY t1.id_propiedad DESC
                      LIMIT 6";
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