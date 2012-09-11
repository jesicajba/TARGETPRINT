<?php

class MY_Model extends CI_Model
{
	var $tabla= "";
	var $clave= "";
	var $numError= 0;
	var $clave2= "";	// por ahora es suficiente. Dificilmente uso un tercer campo para una clave. Asi reuso este codigo :)
	var $clave3= "";	// quien dijo que no? :)	

	function __construct(){
		parent::__construct();
	}

	function insertar( $data ){
		$this->db->insert( $this->tabla, $data );
		$this->numError = $this->db->_error_number();
		return $this->numError;
	}

	function borrar( $id, $sub="" ){
		$this->db->where( $this->clave, $id );
		if ($sub != "" )
		$this->db->where( $this->clave2, $sub );
		$this->db->delete( $this->tabla );
		$this->numError = $this->db->_error_number();
		return $this->numError;
	}

	// devuelve todos los registros como objetos
	function gettodos($desde=-1, $cant=0){
		if ($desde == -1){
			$query = $this->db->get( $this->tabla );
		}
		else
			$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}

	// devuelve registros ordenados por...
	function gettodosOrden($orden, $desde=-1, $cant=0){
		$this->db->order_by($orden);
		if ($desde == -1){
			$query = $this->db->get( $this->tabla );
		}
		else
		$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}
	// devuelve todos los registros como array
	function agettodos($desde=-1, $cant=0){
		if ($desde == -1){
			$query = $this->db->get( $this->tabla );
		}
		else
		$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result_array();
	}

	function get($id, $sub=""){
		$this->db->where( $this->clave, $id );
		if ($sub!=""){
			$this->db->where( $this->clave2, $sub );
		}
		$this->db->limit(1);
		$query = $this->db->get( $this->tabla );

		$this->numError = $this->db->_error_number();
		return $query->result_array();
	}

	function getUno($id, $sub=""){
		$this->db->where( $this->clave, $id );
		if ($sub!=""){
			$this->db->where( $this->clave2, $sub );
		}
		$this->db->limit(1);
		$query = $this->db->get( $this->tabla );

		$this->numError = $this->db->_error_number();
		$temp = $query->result_array();
		if (is_array($temp) && count($temp)>0) 
			return $temp[0];
		else
			return $temp;
	}
	
	function contarTodos(){
		return $this->db->count_all($this->tabla);
	}

	function actualizar( $id, $reg, $sub="", $sub2="" ){
		$this->db->where( $this->clave, $id );
		if ($sub!="")
			$this->db->where( $this->clave2, $sub );
		if ($sub2!="")
			$this->db->where( $this->clave3, $sub2 );
		
		$this->db->limit(1);
		$this->db->update( $this->tabla, $reg );
		$this->numError = $this->db->_error_number();
		return $this->numError;
	}

	function getclaveautomatica(){
		return mysql_insert_id();
	}
	
	function actualizar_2( $reg ){
		$this->db->where( $this->clave, $reg[$this->clave] );
		$this->db->limit(1);
		$this->db->update( $this->tabla, $reg );
		$this->numError = $this->db->_error_number();
		return $this->numError;
	}	
	
	function getLastId(){
		return $this->db->insert_id();
	}
	
	function getFiltro( $campos, $orden="", $cant=0, $desde=-1, $search="" ){

		$this->db->select( "$campos" );
		if ($orden != ""){
			$this->db->order_by( $orden );
		}
		if ($search != ""){
			// $d = $orden. " LIKE '%". $search . "%'";
			// $this->db->where( "$d" );
			$this->db->like( $orden, $search );
		}		
		if ($cant > 0)
			$query = $this->db->get($this->tabla, $cant, $desde);
		else
			$query = $this->db->get($this->tabla);		
		
		$this->numError = $this->db->_error_number();
		return $query->result();		
	}
	
	function get_field_types()
    {
    	$db_field_types = array();
    	foreach($this->db->query("SHOW COLUMNS FROM {$this->tabla}")->result() as $db_field_type)
    	{
    		$type = explode("(",$db_field_type->Type);
    		$db_type = $type[0];
    		
    		if(isset($type[1]))
    		{
    			$length = substr($type[1],0,-1);
    		}
    		else 
    		{
    			$length = '';
    		}
    		$db_field_types[$db_field_type->Field]['db_max_length'] = $length;
    		$db_field_types[$db_field_type->Field]['db_type'] = $db_type;
    		$db_field_types[$db_field_type->Field]['db_null'] = $db_field_type->Null == 'YES' ? true : false;
    		$db_field_types[$db_field_type->Field]['db_extra'] = $db_field_type->Extra;
    	}
    	
    	$results = $this->db->field_data($this->tabla);
    	foreach($results as $num => $row)
    	{
    		$row = (array)$row;
    		$results[$num] = (object)( array_merge($row, $db_field_types[$row['name']])  );
    	}
    	return $results;
    }
	
}

?>