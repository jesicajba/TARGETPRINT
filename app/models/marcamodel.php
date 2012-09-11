<?php

class Marcamodel extends MY_Model{
	
    function __construct(){	
		parent::__construct();
		$this->tabla= "marca_web";	
		$this->clave= "marca";
	}
}
?>