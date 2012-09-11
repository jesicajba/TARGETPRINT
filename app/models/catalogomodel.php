<?php
class Catalogomodel extends MY_Model{
	function __construct(){
		parent::__construct();
		$this->tabla= "precio_talle";
		$this->clave= "codigo";
	}

	function getCatalogoSeccion($seccion, $marca){
		$this->db->where( "seccion", $seccion );
		if ($marca != "TODAS")
		$this->db->where( "marca", $marca );
		$this->db->where("posicion > ", 0);
		// $this->db->from("arti_web");
		$query = $this->db->get("arti_web");
		// echo "Error: ".$this->db->_error_number()." y ".$this->db->_error_message()."<br />";
		// print_r($query->result());

		return $query->result();
	}

	function contarTodosMarca($sec){
			$this->db->where( "marca", $sec);
			$this->db->from("arti_web");
			return $this->db->count_all_results();			
	}
	
	function getCatalogoMarca($marca, $desde=-1, $cant=0){
		$this->db->where( "marca", $marca );
		$this->db->where("posicion > ", 0);

		if ($desde == -1)
			$query = $this->db->get("arti_web");
		else 
			$query = $this->db->get("arti_web", $cant, $desde );
		
		return $query->result();
	}
	

}