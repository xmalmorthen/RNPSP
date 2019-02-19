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
		public function guardar(){
			$response = array('status' => false, 'message' => array('No especificado'));
			if ($this->input->server('REQUEST_METHOD') != 'POST') {
				$response['message'] = 'method get not allowed';
			} else {
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules('nombreUsuario', 'Nombre de usuario', 'required');
				$this->form_validation->set_rules('nombreUsuario', 'Nombre de usuario', 'required');
				$this->form_validation->set_rules('password', 'Contraseña', 'required');
	
				if ($this->form_validation->run() === true) {
					if ($this->ion_auth->login($nombreUsuario, $password)) {
						$response['status'] = true;
						$response['message'] = array(trim($this->ion_auth->messages()));
						$user = $this->ion_auth->user()->row();
						$this->session->set_userdata(SESSIONVAR,array(
							'IdUsuario' => $user->id,
							'Usuario' => $user->username
						));
					} else {
						$response['message'] = array($this->ion_auth->errors());
					}
				} else {
					$response['message'] = $this->form_validation->error_array();
				}
			}
			$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response))
				->_display();
			exit;
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
