<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Preguntas extends CI_Controller{
        
        function __construct(){
    
        parent::__construct();    
		$this->load->library('breadcrumbs');
       
        }

        public function index(){
            // BREADCRUMB
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
		$this->breadcrumbs->push('[ Preguntas ] - Preguntas - Preguntas de verificación', site_url('alta/cedula/datosPersonales'));
		// /BREADCRUMB
	
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','[ Preguntas ] - Preguntas - Preguntas de verificación');
		// /TITLE BODY PAGE
	
		$this->load->view('Preguntas/preguntasVerificacion');
        }
    }


?>