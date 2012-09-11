<?php
	class NORMAL_Controller extends MY_Controller{
		function __construct($ver){
			parent::__construct();
			
			$this->vista_ver = $ver;

			$this->class = get_class($this);
		}
		
		function index(){
			$this->cargarVista($this->vista_ver);
		}
		
		function cargarVista($vista){
			$info["vista"] = $vista;
			$info["titulo"] = $this->titulo;
			$info["ayuda"] = $this->ayuda;
			$this->load->view("template_normal", $info);
			return;	
		}
	}