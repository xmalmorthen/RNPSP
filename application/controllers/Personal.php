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

	# OPCION GRID
		# Obtiene los datos de la pestaña "Identificación" - "Pestaña Ficha Fotográfica"
		# Grid - Ficha Fotográfica
		# EJEMPLO: http://localhost/SGP/Solicitud/getFichaFotografica?pID_ALTERNA=56
		public function getFichaFotografica(){
			Utils::pre($_SESSION);
			if (! $this->input->is_ajax_request()) {
				if (ENVIRONMENT == 'production') redirect('Error/e404','location');
			}
			$curp = $this->input->get('curp');
			try {
				$this->load->model('SOLICITUD_model');
				$responseModel = $this->SOLICITUD_model->sp_getPersonal($curp);
			} 
			catch (rulesException $e){	
				header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
			}
			catch (Exception $e) {
				header("HTTP/1.0 500 Internal Server Error");
			}
			
			header('Content-type: application/json');
			echo json_encode( [ 'results' => $responseModel ] );
			exit;
		}

	


}