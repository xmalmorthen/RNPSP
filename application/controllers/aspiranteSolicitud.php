<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class AapiranteSolicitud extends CI_Controller {
        function __construct()
        {
            parent::__construct();    
            $this->load->library('breadcrumbs');
        }


        public function Alta(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Aspirante - Alta', site_url('alta/cedula/datosAspiranteles'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Aspirante - Alta');
			// /TITLE BODY PAGE
		
			$this->load->view('Solicitudes/index');
        }
        
        
        public function Baja(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Aspirante - Baja', site_url('alta/cedula/datosAspiranteles'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Aspirante - Baja');
			// /TITLE BODY PAGE
		
			$this->load->view('Solicitudes/index');
        }
         
        public function Cambio(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Aspirante - Cambio', site_url('alta/cedula/datosAspiranteles'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Aspirante - Cambio');
			// /TITLE BODY PAGE
		
			$this->load->view('Solicitudes/index');
        }
        
        public function dobleAdscripcion(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Aspirante - Doble adscripción', site_url('alta/cedula/datosAspiranteles'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Aspirante - Doble adscripción');
			// /TITLE BODY PAGE
		
			$this->load->view('Solicitudes/index');
        }
        
        public function Homonimo(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');		
			$this->breadcrumbs->push('[ Solicitudes ] - Solicitudes - Aspirante - Homónimo', site_url('alta/cedula/datosAspiranteles'));
			// /BREADCRUMB
		
			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Solicitudes ] - Solicitudes - Aspirante - Homónimo');
			// /TITLE BODY PAGE
		
			$this->load->view('Solicitudes/index');
		}
    }



?>