<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}
	
	public function index()
	{
		//die(var_dump($this->session->userdata(SESSIONVAR)));

		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Página principal');
		// /TITLE BODY PAGE
		
		$this->load->view('Principal/principalView');
	}	
}
