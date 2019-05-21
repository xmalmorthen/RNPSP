<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class Curso extends CI_controller{
        function __construct(){
            parent::__construct();
            $this->load->library("breadcrumbs");
        }
        function index(){
        // BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Curso ] - Curso - Administración de curso', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Curso ] - Curso - Administración de curso');
        // /TITLE BODY PAGE
        $this->load->view("Curso/administrarCurso");
        }

        function formularioCurso(){
        // BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Curso ] - Curso - Formulario de curso', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Curso ] - Curso - Formulario de curso');
        // /TITLE BODY PAGE
        $this->load->view("Curso/formularioCurso");
        }
        

    }


?>