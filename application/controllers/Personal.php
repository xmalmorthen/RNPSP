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
		$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Laboral - Adscripción actual', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Laboral -  Adscripción actual');
		// /TITLE BODY PAGE
	
		$this->load->view('Personal/index');
	}
}