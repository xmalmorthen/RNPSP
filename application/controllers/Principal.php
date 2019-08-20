<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}
	
	public function index()
	{
		// die(var_dump($this->session->userdata(SESSIONVAR)));

		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->session->set_flashdata('titleBody','Página principal');

		$this->load->view('Principal/principalView');
	}	
}
