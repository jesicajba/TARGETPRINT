<?php
	class Tallemodel extends MY_Model{
		function __construct(){
			parent::__construct();
			$this->tabla= "talle_web";	
			$this->clave= "idtalle_web";			
		}

	function getTalles(){
		$this->db->select($this->clave);
		$query = $this->db->get($this->tabla);
		return $query->result_array();
	}
		
}