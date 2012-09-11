<?php

class Detalle extends CI_Controller
{
	function Detalle()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('detalle');
	}
	
	
}