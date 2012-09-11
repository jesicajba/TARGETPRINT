<?php
	class MY_Controller extends CI_Controller {
		
		var $vista_ver = "";
		var $vista_add = "";
		var $vista_edit = "";
		
		var $class = "";
		var $limite = 5; // enviar a config
		
		var $data = array();
		var $titulo="";
		var $ayuda="";
		
		var $editor = "";
		var $imagen = "imagen";
		var $path = "./uploads/";
		var $crearTmb = FALSE;
		
		var $img_anchomax = 640;
		var $img_altomax = 480;
		var $img_tamanomax = 500;
				
		function __construct(){
				parent::Controller();
		}
	}