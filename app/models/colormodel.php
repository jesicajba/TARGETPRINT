<?php
	class Colormodel extends MY_Model{
		function __construct(){
			parent::__construct();
			$this->tabla= "color_web";	
			$this->clave= "idcolor_web";			
		}

	function getColores(){
		$this->db->select($this->clave);
		$query = $this->db->get($this->tabla);
		return $query->result_array();
	}
		
}