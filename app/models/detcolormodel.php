<?php
	class Detcolormodel extends MY_Model{
		function __construct(){
			parent::__construct();
			$this->tabla= "colordet_web";	
			$this->clave= "id";
			$this->clave2= "idcolor_web";			
		}
	
	function getColoresTabla( $t ){
		$this->db->where($this->clave2, $t );
		$query = $this->db->get( $this->tabla );
		$this->numError = $this->db->_error_number();
		return $query->result_array();
	}
	
}