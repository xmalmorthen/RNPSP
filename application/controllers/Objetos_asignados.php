<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Cedula extends CI_Controller {
    function __construct()
    {
		parent::__construct();    
		$this->load->library('breadcrumbs');
	}	
   		// OBJETOS ASIGNADOS 

	public function armamentoAsignado(){
			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Objetos asignados - Armamento asignado', site_url('alta/cedula/Datos_personales'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Objetos asignados -  Armamento asignado');
			// /TITLE BODY PAGE
		
			$this->load->view('Cedula/');
		}

	public function vehiculoAsignado (){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Objetos asignados - Vehiculo asignado', site_url('alta/cedula/Datos_personales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Datos Generales -  Vehiculo asignado');
		// /TITLE BODY PAGE
	
		$this->load->view('Cedula/Objetos_asignados');

	}

	public function equipoAsignado(){
		// BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Cédula ] - Alta de Persona - Objetivos asignados - Equipo policial designado', site_url('alta/cedula/Datos_personales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Cédula ] - Alta de Persona - Objetivos asignados -   Equipo policial asignado');
		// /TITLE BODY PAGE
	
		$this->load->view('Cedula/Objetos_asignados');
	}


}


?>