<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cedula extends CI_Controller {
	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}

	public function persona()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', site_url());		
		$this->breadcrumbs->push('[ Cédula ] Alta de Persona', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/cedulaView');
	}

	public function aspirante()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', site_url());		
		$this->breadcrumbs->push('[ Cédula ] Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/cedulaView');
	}

	public function replicar()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', site_url());		
		$this->breadcrumbs->push('[ Cédula ] Replicar', site_url('cedula/replicar'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Replicar');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/cedulaView');
	}
}