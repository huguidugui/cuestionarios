<?php
class Verbos_model extends CI_Model
{
	/**
	 * Obtener datos de una tabla con condiciones (generaliza la obtención de datos)
	 * @param {string} $tabla nombre de la tabla
	 * @param {arry} $campos array de campos para el SELECT
	 * @param {array} $where condiciones de WHERE en array clave=>valor
	 * @param {string} $columnOrder nombre del campo para ordenar
	 * @param {string} $order ASC | DESC
	 * @param {int} $start inicio para el LIMIT de datos (se usa para la paginación)
	 * @param {int} $end fin para el LIMIT de datos (se usa para la paginación)
	 * @return {mix} success -> id de la insertada (int) | fail -> false 
	*/

	public function obtener(
		$tabla = '',
		$campos = array(),
		$where = array(), 
		$columnOrder = '', 
		$order = 'ASC', 
		$start = 0, 
		$end = 0
	) {

        if( count($campos) ) {
            $this->db->select("*");
        } else {
            $implode = implode(",", $campos);
            $this->db->select($implode);
        }

        $this->db->from($tabla);
            
        if($end != 0){
            $this->db->limit($end , $start);
        }

        if ($columnOrder != '') {
            $this->db->order_by($columnOrder, $order);
        }

        if( count($where) ) {
            $this->db->where($where);
        }

        $query = $this->db->get();
        // Para debug: ver query generado en esta consulta
        // echo $this->db->last_query(); exit; 

       	return $query->result(); 
    }

	/**
	 * Agregar fila a la tabla correspondiente
	 * @param {string} $tabla nombre de la tabla
	 * @param {arrayObject} $data array clave=>valor de cada fila a insertar
	 * @return {mix} success -> id de la insertada (int) | fail -> false 
	*/
	public function agregar($tabla, $data)
	{
	    $this->db->insert($tabla, $data);
	    if($this->db->affected_rows() > 0) {
	        return $this->db->insert_id();
	    } else {
	        return false;
	    }
  	}


	/**
	 * Actualiza la fila de la tabla correspondiente
	 * @param {int} $id identificador único de la fila
	 * @param {string} $tabla nombre de la tabla
	 * @param {arrayObject} $data array clave=>valor de cada fila a actualizar
	 * @return {boolean} success -> true | fail -> false 
	*/
	public function actualizar($id, $tabla, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($tabla, $data);
        if($this->db->affected_rows() > 0){
           return true;
        } else {
           return false;
        }
    }

    /**
	 * Borra una fila de la tabla correspondiente
	 * @param {int} $id identificador único de la fila
	 * @param {string} $tabla nombre de la tabla
	 * @return {boolean} success -> true | fail -> false 
	*/
    public function borrar($id, $tabla) 
    {
        $this->db->delete($tabla, array('id' => $id));

        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}

