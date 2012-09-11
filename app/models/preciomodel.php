<?php
	class Preciomodel extends MY_Model{
		function __construct(){
			parent::__construct();
			$this->tabla= "precio_arti";	
			$this->clave= "id";	
		}

	function getPrecios($codigo){
		$query = $this->db->select( "p.idtalle, p.idcolor, t.descripcion as nombretalle, c.descripcion as nombrecolor, p.precio")
						->where( "p.codigo", $codigo )
						->where( "p.activo", true )
						->join( "talledet_web t ", "p.idtalle = t.idtalle")
						->join( "colordet_web c ", "p.idcolor = c.idcolor")
						->get( $this->tabla . " p ");
		$this->numError = $this->db->_error_number();
		return $query->result_array();				
	}

	function getTalles($codigo){
		$query = $this->db->select( "DISTINCT( p.idtalle ), t.descripcion")
						->where( "p.codigo", $codigo )
						->where( "p.activo", true )
						->join( "talledet_web t ", "p.idtalle = t.idtalle") 
						->get( $this->tabla . " p ");
		$this->numError = $this->db->_error_number();
		return $query->result_array();				
	}
	
	function getColores($codigo){
		$query = $this->db->select( "DISTINCT( p.idcolor ), c.descripcion, c.codigo as color")
						->where( "p.codigo", $codigo )
						->where( "p.activo", true )
						->join( "colordet_web c ", "p.idcolor = c.idcolor" )
						->get( $this->tabla . " p ");
		$this->numError = $this->db->_error_number();
		return $query->result_array();				
	}
	
	function agetPrecios($codigo){
		$this->db->where( "codigo", $codigo );
		$query = $this->db->get($this->tabla);
		return $query->result_array();
	}	
	function getPrecioItem($codigo, $talle, $det, $color, $col){
		$this->db->where( "codigo", $codigo );
		$this->db->where( "talle", $talle );
		$this->db->where( "idtalle", $det );
		$this->db->where( "color", $color );
		$this->db->where( "idcolor", $col );
		
		$query = $this->db->get($this->tabla);
		return $query->result_array();
	}
}