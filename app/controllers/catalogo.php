<?php

class Catalogo extends CI_Controller
{
	function Catalogo()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('catalogo');
	}
	
	
}