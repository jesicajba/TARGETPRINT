<?php

class Carritomodel extends MY_Model{
	
	function Carritomodel(){
		parent::__construct();
		$this->tabla= "cliente_web";	
		$this->clave= "id";
	}
	
	function insertar($data){
		$err=parent::insertar($data);
		return mysql_insert_id();
	}
	
	function insertarPedido($head){
		$regis = array();
		
		$this->tabla= "pedido_web";	
		$this->clave= "id";
		
		$err=parent::insertar($head);
		$id=mysql_insert_id();
		
		return $id;
	}
	
	function insertarDetalle($detalle){
		$this->tabla= "detalle_web";	
		$this->clave= "id";
		
		foreach( $detalle as $reg ){
			$err=parent::insertar($reg);
			if ($err){
				return $err;
			}			
		}	
		return FALSE; // devuelve codigo de error FALSE = todo bien
	}
	
}
?>