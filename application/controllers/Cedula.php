<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cedula extends CI_Controller {
	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}	

	

	public function Datos_personales()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Datos_personales');
	}
	public function Objetos_asignados()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Objetos_asignados');
	}
	public function Laboral()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Laboral');
	}
	public function Capacitacion()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Capacitacion');
	}


	public function Sanciones()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Sanciones');
	}

	public function Identificacion()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Identificacion');
	}
	public function Aspirante()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Aspirante');
	}
	public function Filiacion()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Aspirante', site_url('alta/cedula/aspirante'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Filiacion');
	}


}