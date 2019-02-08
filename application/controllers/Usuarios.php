<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Usuarios extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->library('breadcrumbs');
        }

	
        public function index(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Usuarios ] - Usuarios - Administración', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Usuarios ] - Usuarios - Administración');
			// /TITLE BODY PAGE

			$this->load->view('Usuarios/index');
        }
        public function Registro(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Usuarios ] - Usuarios - Registro de usuarios - Alta', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Usuarios ] - Usuarios - Registro de usuarios - Alta');
			// /TITLE BODY PAGE

			$this->load->view('Usuarios/Registro');
        }

        public function Modificar(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Usuarios ] - Usuarios - Modificación de usuarios - Modificar', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Usuarios ] - Usuarios - Modificación de usuarios - Modificar');
			// /TITLE BODY PAGE

			$this->load->view('Usuarios/Modificar');
        }

   
        public function Ver(){

            // BREADCRUMB
            $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
            $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Consulta de usuarios - Consulta', site_url('alta/cedula/datosPersonales'));
            // /BREADCRUMB

            // TITLE BODY PAGE
            $this->session->set_flashdata('titleBody','[ Usuarios ] - Usuarios - Consulta de usuarios - Consulta');
            // /TITLE BODY PAGE

            $this->load->view('Usuarios/Ver');
        }


    }



?>
