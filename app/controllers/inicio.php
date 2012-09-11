<?php

class Inicio extends CI_Controller
{
	function Inicio()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('inicio');
	}
	
	function admin()
	{
		redirect ("admin");
	}
	
	function alogin(){
		$this->load->view("alogin");
	}
	
	function historia(){
		$this->load->view("historia");
	}
	
	function ofertas(){
		$this->load->helper("file");
		$datos = array();
		// $datos["titulo"] = "OFERTAS";
		// $datos["contenido"] = "lugar reservado para las ofertas...";
		// $this->load->view("pagina", $datos);
		$datos["pagina"] = "oferta.php";
		$this->load->view("base", $datos);
	}
	
	function novedad(){
		$datos = array();
		$datos["pagina"] = "novedad.php";
		$this->load->view("base", $datos);
	}
	
	function mapas(){
		$datos = array();
		$datos["titulo"] = "MAPA DEL SITIO";
		$datos["contenido"] = "mapa del sitio...";
		
		$this->load->view("pagina", $datos);
	}

	function clave_enviada(){
		$datos['titulo'] = "EMAIL ENVIADO"; 
		$datos['nota'] = 'Se le ha enviado un email con el enlace para restablecer su contraseña. 
			<br />Haga clic en dicho enlace para iniciar el procedimiento de recuperacion de la clave olvidada. <br />Gracias. ';
		
		$this->load->view('ver_nota', $datos );
	}

	function clave_cambiada(){
		$datos['titulo'] = "CLAVE HA SIDO ACTUALIZADA"; 
		$datos['nota'] = "Su nueva clave ha sido enviada por email. <br />".
			"Una vez recibida Ud. podrá ingresar al sitio con la misma".
			"<br/>Posteriormente, si lo desea, podrá cambiarla por una clave de su preferencia.";
		
		$this->load->view('ver_nota', $datos );
	}

	function clave_modificada(){
		$datos['titulo'] = "CLAVE HA SIDO MODIFICADA"; 
		$datos['nota'] = "Su clave ha sido actualizada. <br />".
			"Gracias!.";
		
		$this->load->view('ver_nota', $datos );
	}
	
}