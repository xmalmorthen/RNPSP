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
		$curp = $this->session->local_userdata('CURP');
		$this->load->model('PERSONA_model');
		$responseModel = $this->PERSONA_model->sp_getPersonal($curp);
		
		$this->load->library('parser');
		$this->parser->parse('Personal/index',array('personal'=>(array)$responseModel));
	}

	
	public function Ver($id = null){
		if (!$id)
			show_error('Parámetros incorrecto', 403, 'Error en la petición');

		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes  - Ver', site_url('ver/cedula/datosPersonales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Ver');
		// /TITLE BODY PAGE
	
		$this->load->view('Solicitud/Ver',array('id' => $id, 'isFromPersonal' => true));
	}

}