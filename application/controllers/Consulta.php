<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {
	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}

	public function tipo($tipo = NULL)
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Consulta ] ' . ($tipo ? " - {$tipo}" : '') , "Consulta" . ($tipo ? "/{$tipo}" : ''));		
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Consulta');
		// /TITLE BODY PAGE

		$this->load->view('Consulta/consultaView');
	}
}