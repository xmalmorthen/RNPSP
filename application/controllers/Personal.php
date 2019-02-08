<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {
	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}

	public function index(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Personal ] - Personal - Administración de personal', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Personal ] - Personal - Administración de personal');
		// /TITLE BODY PAGE
	
		$this->load->view('Personal/index');
	}

	
	public function Ver(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Personal ] - Personal - Consulta personal', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Personal ] - Personal - Consulta personal');
		// /TITLE BODY PAGE
	
		$this->load->view('Personal/Ver');
	}


}