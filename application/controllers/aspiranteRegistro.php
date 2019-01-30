<?php defined('BASEPATH') OR exit('No direct script access allowed');

class aspiranteRegistro extends CI_Controller {
	function __construct()
    {
		parent::__construct();
		$this->load->library('breadcrumbs');
	}

	public function index(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Datos personales', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales - Datos personales');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');
		}


		// DATOS PERSONALES

	public function datosPersonalestab(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Datos personales', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales - Datos personales');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');
		}

	public function desarrolloAcademico(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Desarrollo académico', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales - Desarrollo académico');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');
		}

	public function experienciaDocente(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Experiencia docente', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Experiencia docente');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');
		}

	public function domicilioActual(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Domicilio actual', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Domicilio actual');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');
		}

	public function Referencias(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Referencias', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Referencias');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');
		}

	public function Socioeconomicos(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Socioeconómicos', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Socioeconómicos');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');

		}

	public function prestaciones (){
				// BREADCRUMB
				$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
				$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Datos Generales - Prestaciones', site_url('alta/cedula/datosPersonales'));
				// /BREADCRUMB

				// TITLE BODY PAGE
				$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Prestaciones');
				// /TITLE BODY PAGE

				$this->load->view('Registro/index');
		}

		// OBJETOS ASIGNADOS

	public function armamentoAsignado(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Objetos asignados - Armamento asignado', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Objetos asignados -  Armamento asignado');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');
		}

	public function vehiculoAsignado (){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Objetos asignados - Vehiculo asignado', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Vehiculo asignado');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');

	}

	public function equipoAsignado(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Objetivos asignados - Equipo policial designado', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Objetivos asignados -   Equipo policial asignado');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}



	// Laboral
	public function adscripcionActual(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Laboral - Adscripción actual', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Laboral -  Adscripción actual');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');
	}


	public function empleosSeguridad()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Laboral - Empleos de seguridad pública', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Laboral - Empleos de seguridad pública');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}


	public function empleosDiversos()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Laboral - Empleos diversos ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Laboral - Empleos diversos');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}

	public function Actitudes()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Laboral -  Actitudes hacia el empleo', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Laboral - Actitudes hacia el empleo');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}

	public function disciplinaPolicial()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Laboral -  Disciplina policial', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Laboral - Disciplina policial');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}
	public function Comisiones()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Laboral -  Comisiones', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Laboral - Comisiones');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');

	}
	// Capacitación
	public function seguridadPublica()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Capacitación -  Capacitación de seguridad pública', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Capacitación - Capacitación de seguridad pública');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}

	public function Adicional()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Capacitación -  Capacitación adicional', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Capacitación - Capacitación adicional');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}

	public function Idiomas()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Capacitación -  Idiomas', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Capacitación - Idiomas');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}

	public function Habilidades()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Capacitación -  Habilidades', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Capacitación - Habilidades');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}


	public function Afiliacion()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Capacitación -  Afiliación a agrupaciones', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Capacitación - Afiliación a agrupaciones');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}

	//Sanciones y estimulos

	public function Sanciones()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Sanciones/Estimulos -  Sanciones y/o estimulos ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Sanciones/Estimulos - Sanciones y/o estimulos');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}
	public function Resoluciones()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Sanciones/Estimulos - Resoluciones ministeriales y/o judiciales ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Sanciones/Estimulos - Resoluciones ministeriales y/o judiciales ');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}
	public function Estimulos()
	{
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Sanciones/Estimulos - Estimulos recibidos ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Sanciones/Estimulos - Estimulos recibidos ');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');


	}
	// Identificación
	public function mediaFiliacion(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Identificación - Media filiación ', site_url('alta/cedula/persona'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Identificación - Media filiación ');
			// /TITLE BODY PAGE

			$this->load->view('Registro/index');
	}
	public function Datos(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Identificación - Media filiación ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Identificación - Media filiación ');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
}
public function Señas(){
	// BREADCRUMB
	$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
	$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Identificación - Media filiación ', site_url('alta/cedula/persona'));
	// /BREADCRUMB

	// TITLE BODY PAGE
	$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Identificación - Media filiación ');
	// /TITLE BODY PAGE

	$this->load->view('Registro/index');
}

	public function Fotografica(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Identificación - Ficha fotográfica ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Identificación - Ficha fotográfica ');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}


	public function Decadactilar(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Identificación - Registro decadactilar ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Identificación - Registro decadactilar ');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}

	public function Documento(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Identificación - Digitalización de documento ', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Identificación - Digitalización de documento ');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}

	public function Voz(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
		$this->breadcrumbs->push('[ Cédula ] - Alta de persona - Identificación - Identificación de voz', site_url('alta/cedula/persona'));
		// /BREADCRUMB

		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de persona - Identificación - Identificación de voz ');
		// /TITLE BODY PAGE

		$this->load->view('Registro/index');
	}





}
