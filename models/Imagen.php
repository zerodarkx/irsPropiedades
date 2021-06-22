<?php

class Imagen extends Model{

    public function set(){}
    public function get(){}
    public function del(){}

    public function getImagenFrontis($id_propiedad = ''){
        $this->query = "SELECT 
                            id_imagen AS id,
                            nom_imagen AS arc
                        FROM imagenes_propiedad
                        WHERE id_propiedad = $id_propiedad AND id_tipoImagen = 1";
        $this->get_query();

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value );
        }
        return $data;
    }

    public function getImagenesPorPropiedad($id_propiedad = ''){
        $this->query = "SELECT 
                            t1.id_imagen AS id,
                            t1.nom_imagen AS arc,
                            t2.id_tipoImagen AS id_tipo,
                            t2.nombre_tipoImagen AS tipo
                        FROM imagenes_propiedad AS t1
                        INNER JOIN tipo_imagenes_propiedades AS t2 ON (t2.id_tipoImagen = t1.id_tipoImagen)
                        WHERE id_propiedad = $id_propiedad
                        ORDER BY t1.id_tipoImagen ASC";
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
