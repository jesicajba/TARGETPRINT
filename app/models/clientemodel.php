<?php
	class Clientemodel extends MY_Model{
		function Clientemodel(){
			parent::__construct();		
			$this->tabla= "cliente_web";	
			$this->clave= "id";
	}
	
	function getNombre( $nombre ){
		$this->db->where( "usuario", $nombre );
		
		$query = $this->db->get( $this->tabla );

		$this->numError = $this->db->_error_number();
		return $query->result_array();
	}
}