<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
		$this->load->model('Principal_model');
	}
	
	public function index()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Página principal');
		// /TITLE BODY PAGE
		
		try {
			$response = $this->Principal_model->tmpTestXmal();
		} catch(Exception $e){		
			//Msg_reporting::setOutputError($e->getMessage());
		}

		$this->load->view('Principal/principalView');
	}
}
