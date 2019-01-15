<?php defined('BASEPATH') OR exit('No direct script access allowed');

class aspiranteCedula extends CI_Controller {
	function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}	

		// DATOS PERSONALES

	public function datosPersonalestab(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Datos Generales - Datos personales', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Datos Generales - Datos personales');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

	public function desarrolloAcademico(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Datos Generales - Desarrollo académico', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Datos Generales - Desarrollo académico');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

	public function experienciaDocente(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Datos Generales - Experiencia docente', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Datos Generales -  Experiencia docente');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

	public function domicilioActual(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Datos Generales - Domicilio actual', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Datos Generales -  Domicilio actual');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

	public function Referencias(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Datos Generales - Referencias', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Datos Generales -  Referencias');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');
		}

	public function Socioeconomicos(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Datos Generales - Socioeconómicos', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Datos Generales -  Socioeconómicos');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Datos_personales');

		}

	public function prestaciones (){
				// BREADCRUMB
				$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
				$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Datos Generales - Prestaciones', site_url('alta/cedula/Datos_personales'));
				// /BREADCRUMB
			
				// TITLE BODY PAGE
				$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Datos Generales -  Prestaciones');
				// /TITLE BODY PAGE
			
				$this->load->view('Cedula/Datos_personales');
		}

		// OBJETOS ASIGNADOS 

	public function armamentoAsignado(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Objetos asignados - Armamento asignado', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Objetos asignados -  Armamento asignado');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Objetos_asignados');
		}

	public function vehiculoAsignado (){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Objetos asignados - Vehiculo asignado', site_url('alta/cedula/Datos_personales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Datos Generales -  Vehiculo asignado');
		// /TITLE BODY PAGE
	
		$this->load->view('Cedula/Objetos_asignados');

	}

	public function equipoAsignado(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Objetivos asignados - Equipo policial designado', site_url('alta/cedula/Datos_personales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Objetivos asignados -   Equipo policial asignado');
		// /TITLE BODY PAGE
	
		$this->load->view('Cedula/Objetos_asignados');
	}



	// Laboral
	public function adscripcionActual(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Laboral - Adscripción actual', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Laboral -  Adscripción actual');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/Laboral');
	}


	public function empleosSeguridad()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Laboral - Empleos de seguridad pública', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Laboral - Empleos de seguridad pública');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Laboral');
	}


	public function empleosDiversos()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Laboral - Empleos diversos ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Laboral - Empleos diversos');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Laboral');
	}

	public function Actitudes()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Laboral -  Actitudes hacia el empleo', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Laboral - Actitudes hacia el empleo');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Laboral');
	}

	public function disciplinaPolicial()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Laboral -  Disciplina policial', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Laboral - Disciplina policial');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Laboral');
	}
	public function Comisiones()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Laboral -  Comisiones', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Laboral - Comisiones');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Laboral');

	}
	// Capacitación
	public function seguridadPublica()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Capacitación -  Capacitación de seguridad pública', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Capacitación - Capacitación de seguridad pública');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Capacitacion');
	}

	public function Adicional()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Capacitación -  Capacitación adicional', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Capacitación - Capacitación adicional');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Capacitacion');
	}

	public function Idiomas()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Capacitación -  Idiomas', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Capacitación - Idiomas');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Capacitacion');
	}

	public function Habilidades()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Capacitación -  Habilidades', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Capacitación - Habilidades');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Capacitacion');
	}

	
	public function Afiliacion()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Capacitación -  Afiliación a agrupaciones', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Capacitación - Afiliación a agrupaciones');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Capacitacion');
	}

	//Sanciones y estimulos  

	public function Sanciones()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Sanciones/Estimulos -  Sanciones y/o estimulos ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Sanciones/Estimulos - Sanciones y/o estimulos');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Sanciones');
	}
	public function Resoluciones()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Sanciones/Estimulos - Resoluciones ministeriales y/o judiciales ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Sanciones/Estimulos - Resoluciones ministeriales y/o judiciales ');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Sanciones');
	}
	public function Estimulos()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Sanciones/Estimulos - Estimulos recibidos ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Sanciones/Estimulos - Estimulos recibidos ');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Sanciones');

	
	}
	// Identificación
	public function mediaFiliacion(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Identificación - Media filiación ', site_url('alta/cedula/persona'));
			// /BREADCRUMB
	
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Identificación - Media filiación ');
			// /TITLE BODY PAGE
	
			$this->load->view('Cedula/Identificacion');
	}
	public function Datos(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Identificación - Media filiación ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Identificación - Media filiación ');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Identificacion');
}
public function Señas(){
	// BREADCRUMB
	$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
	$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Identificación - Media filiación ', site_url('alta/cedula/persona'));
	// /BREADCRUMB

	// TITLE BODY PAGE
	$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Identificación - Media filiación ');
	// /TITLE BODY PAGE

	$this->load->view('Cedula/Identificacion');
}

	public function Fotografica(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Identificación - Ficha fotográfica ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Identificación - Ficha fotográfica ');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Identificacion');
	}

		
	public function Decadactilar(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Identificación - Registro decadactilar ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Identificación - Registro decadactilar ');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Identificacion');
	}

	public function Documento(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Identificación - Digitalización de documento ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Identificación - Digitalización de documento ');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Identificacion');
	}

	public function Voz(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de aspirante - Identificación - Identificación de voz', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de aspirante - Identificación - Identificación de voz ');
		// /TITLE BODY PAGE

		$this->load->view('Cedula/Identificacion');
	}





}