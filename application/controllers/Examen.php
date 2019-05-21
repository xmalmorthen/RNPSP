<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examen extends CI_controller {
    function __construct(){
        parent::__construct();
        $this->load->library("breadcrumbs");

    }
    function index(){
           // BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Examen ] - Examen - Administración de examen', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Examen ] - Examen - Administración de examen');
        // /TITLE BODY PAGE
        $this->load->view("Examen/administrarExamen");
    }
    
    function formularioExamen(){
           // BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Examen ] - Examen - formulario de examen', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Examen ] - Examen - formulario de examen');
        // /TITLE BODY PAGE
        $this->load->view("Examen/formularioExamen");
    }
}




?>