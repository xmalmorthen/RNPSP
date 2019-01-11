<?php defined('BASEPATH') OR exit('No direct script access allowed');

class personaCedula extends CI_Controller {
	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}	

	public function datosPersonales(){

		function datosPersonalestab(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Datos Personales', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales - Datos Personales');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

		function desarrolloAcademico(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Desarrollo académico', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales - Desarrollo académico');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

		function experienciaDocente(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Domicilio actual', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Experiencia docente');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

		function domicilioActual(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Domicilio actual', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Domicilio actual');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

		function Referencias(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Referencias', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Referencias');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

		function Socioeconomicos(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Socioeconómicos', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Socioeconómicos');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');

		}

		function Prestaciones (){
				// BREADCRUMB
				$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
				$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Prestaciones', site_url('alta/cedula/Datos_personales'));
				// /BREADCRUMB
			
				// TITLE BODY PAGE
				$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Prestaciones');
				// /TITLE BODY PAGE
			
				$this->load->view('Cedula/Datos_personales');
		}


	}


	
	public function Objetos_asignados()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Objetos asignados', site_url('alta/cedula/aspirante'));
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