<?php

class Usuariomodel extends MY_Model{
	
	function Usuariomodel(){
		parent::__construct();		
		$this->tabla= "usuario_web";	
		$this->clave= "idusuario";
	}
}
?>