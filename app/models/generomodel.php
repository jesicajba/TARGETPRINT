<?php

class Generomodel extends MY_Model{
	
    function __construct(){
		parent::__construct();
		$this->tabla= "genero_web";	
		$this->clave= "genero";
	}
}
?>