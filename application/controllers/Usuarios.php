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
			$this->breadcrumbs->push('[ Usuarios ] - Usuarios - Registro de usuarios - Alta', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Usuarios ] - Usuarios - Registro de usuarios - Alta');
			// /TITLE BODY PAGE

			$this->load->view('Usuarios/index');
        }
        public function Ver(){

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
			$this->breadcrumbs->push('[ Usuarios ] - Usuarios - Registro de usuarios - Alta', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Usuarios ] - Usuarios - Registro de usuarios - Alta');
			// /TITLE BODY PAGE

			$this->load->view('Usuarios/Registro');
        }

        public function darBaja(){

			// BREADCRUMB
			$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
			$this->breadcrumbs->push('[ Usuarios ] - Usuarios - Registro de usuarios - Alta', site_url('alta/cedula/datosPersonales'));
			// /BREADCRUMB

			// TITLE BODY PAGE
			$this->session->set_flashdata('titleBody','[ Usuarios ] - Usuarios - Registro de usuarios - Alta');
			// /TITLE BODY PAGE

			$this->load->view('Usuarios/Registro');
        }

        public function nuevo(){

            // BREADCRUMB
            $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
            $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Registro de usuarios - Alta', site_url('alta/cedula/datosPersonales'));
            // /BREADCRUMB

            // TITLE BODY PAGE
            $this->session->set_flashdata('titleBody','[ Usuarios ] - Usuarios - Registro de usuarios - Alta');
            // /TITLE BODY PAGE

            $this->load->view('Usuarios/Registro');
        }


    }



?>
