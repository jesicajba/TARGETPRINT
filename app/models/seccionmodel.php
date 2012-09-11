<?php

class Seccionmodel extends MY_Model{
	
    function __construct(){
		parent::__construct();
		$this->tabla= "seccion_web";	
		$this->clave= "seccion";
	}
}
?>