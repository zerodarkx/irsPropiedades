<?php

class Propiedad extends Model{

  public function set($data_propiedad = array()){
    foreach ($data_propiedad as $key => $value) {
      $$key = $value;
    }

    $this->query = "INSERT INTO propiedad (id_ejecutivo, id_cod_telefono, id_comuna, rut_propiedad, nombre_propiedad, correo_propiedad, telefono_propiedad, direccion_propiedad, id_tipo_propiedad, rol_propiedad, valor_propiedad, mTerreno, mConstruidos, observaciones, banos, estacionamiento, dormitorio, bodega)
                      VALUES (1, $cod_tel, $comuna, '$rut_pro', '$nom_pro', '$correo_pro', $telefono, '$direccion', '$propiedad', '$rol_pro', '$valorVenta', '$m_terreno', '$m_construidos', '$obs', $banos, $estacionamiento, $dormitorio, $bodega)";

    $val = $this->set_query_id();
    return $val;

  }
  public function get($id_propiedad = ''){
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
                      DATEDIFF(now(), t1.fecha_ingreso) AS p,
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
                    WHERE t1.id_propiedad = $id_propiedad";
      $this->get_query();

      $data = array();

      foreach ($this->rows as $key => $value) {
          array_push($data, $value );
      }
      return $data;
  }
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

  public function setSolicitudPropiedad($data_solicitud = array()){
    foreach ($data_solicitud as $key => $value) {
      $$key = $value;
    }

    $this->query = "INSERT INTO propiedad_cliente (id_propiedad, rut_cliente, nombre_cliente, telefono, correo, mensaje)
                    VALUES ('$id_propiedad', '$rut_cliente', '$nombre_cliente', '$telefono_cliente', '$correo_cliente', '$mensaje_cliente')";

    $val = $this->set_query();
    return $val;
  }

  public function getDetallePropiedad($id_propiedad = ''){
		$this->query = "SELECT 
							id_detallePropiedad AS id,
							id_propiedad AS propiedad,
							encabezado,
							direccion,
							desc_general,
							desc_zona
						FROM propiedad_detalle
						WHERE id_propiedad = $id_propiedad";
		
		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value );
		}
		return $data;
	}

  public function loginUsuario($user, $password){
    $this->query = "SELECT 
                      *
                    FROM propiedad_usuario
                    WHERE user_propiedad = '$user' AND pass_propiedad = MD5('$password') AND estado_usuario = 2";
		
		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value );
		}
		return $data;
  }

  public function setPujaPropiedad($data_puja = array()){
    foreach ($data_puja as $key => $value) {
      $$key = $value;
    }

    $this->query = "UPDATE propiedad_subasta SET
                      estado_subasta = 0
                    WHERE id_propiedad = $id_propiedad";

    $this->set_query();

    $this->query = "INSERT INTO propiedad_subasta (id_propiedad, id_usuario, porcentaje, valor_antesPuja, valor_conPuja) 
                    VALUES ('$id_propiedad', '$id_usuario', '$porcentaje', '$valor_antesPuja', '$valor_conPuja') ";

    $val = $this->set_query();
    return $val;
  }

  public function getValorPuja($id_propiedad = ''){
    $this->query = "SELECT 
                      t1.valor_propiedad AS v_propiedad,
                      t2.valor_conPuja AS v_puja
                    FROM propiedad AS t1
                    LEFT JOIN propiedad_subasta AS t2 ON (t2.id_propiedad = t1.id_propiedad)
                    WHERE t1.id_propiedad = $id_propiedad
                    ORDER BY t2.id_subasta DESC";
		
		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value );
		}
		return $data;
  }

  public function getUsuarioPerfil($id_usuario = ''){
    $this->query = "SELECT 
                      *
                    FROM propiedad_usuario
                    WHERE id_usuario = $id_usuario";
		
		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value );
		}
		return $data;
  }

  public function changePassword($data_password = array()){
    foreach ($data_password as $key => $value) {
      $$key = $value;
    }

    $this->query = "UPDATE propiedad_usuario SET
                    pass_propiedad = MD5('$password_usuario')
                    WHERE id_usuario = $id_usuario";

    $val = $this->set_query();
    return $val;
  }

  public function setRegistroUsuario($data_registro = array()){
    foreach ($data_registro as $key => $value) {
      $$key = $value;
    }

    $this->query = "INSERT INTO propiedad_usuario (user_propiedad, pass_propiedad, nombre_usuario, telefono_usuario, correo_usuario, rut_usuario)
                    VALUES ('$user', MD5('$pass_usu'), '$nom_com', '$tel_usu', '$correo_usu', '$rut_usu') ";

    $val = $this->set_query();
    return $val;
  }

  public function getPropiedadesSubastadasPorUsuario($id_usuario = ''){
    $this->query = "SELECT
                      t1.id_subasta AS id,
                      t1.id_propiedad AS propiedad,
                      MAX(t1.valor_conPuja) AS valor,
                      MAX(t1.valor_antesPuja) AS antes_valor,
                      t3.nombre_comuna AS comuna,
                      t4.nombre_region AS region
                    FROM propiedad_subasta AS t1
                    INNER JOIN propiedad AS t2 ON (t2.id_propiedad = t1.id_propiedad)
                    INNER JOIN comunas AS t3 ON (t3.id_comuna = t2.id_comuna)
                    INNER JOIN regiones AS t4 ON (t4.id_region = t3.id_region)
                    WHERE t1.id_usuario = $id_usuario AND t1.estado_subasta = 1
                    GROUP BY t1.id_propiedad
                    ORDER BY t1.valor_conPuja DESC";

    $this->get_query();

    $data = array();

    foreach ($this->rows as $key => $value) {
      array_push($data, $value );
    }
    return $data;
  }

  public function getPropiedadesSubastadasPerdidasPorUsuario($id_usuario = '', $query){
    $this->query = "SELECT
                      t1.id_subasta AS id,
                      t1.id_propiedad AS propiedad,
                      MAX(t1.valor_conPuja) AS valor,
                      MAX(t1.valor_antesPuja) AS antes_valor,
                      t3.nombre_comuna AS comuna,
                      t4.nombre_region AS region
                    FROM propiedad_subasta AS t1
                    INNER JOIN propiedad AS t2 ON (t2.id_propiedad = t1.id_propiedad)
                    INNER JOIN comunas AS t3 ON (t3.id_comuna = t2.id_comuna)
                    INNER JOIN regiones AS t4 ON (t4.id_region = t3.id_region)
                    WHERE t1.id_usuario = $id_usuario AND t1.estado_subasta = 0 AND t1.id_propiedad NOT IN ($query)
                    GROUP BY t1.id_propiedad
                    ORDER BY t1.valor_conPuja DESC";

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