<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserSession extends CI_Controller {

	public function index(){
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody','Iniciar sesión');
		// /TITLE BODY PAGE

		// CONFIGURATIONS
		$this->session->set_flashdata('noLayout',TRUE);
		// /CONFIGURATIONS

		$model['toGo'] = $this->input->get('toGo');

		$this->load->view('Session/logInView',$model);
	}

	public function ajaxLogIn(){
		if (! $this->input->is_ajax_request()) {
			redirect('Error/e404','location');
        }
		if (!$this->input->post()) {
			redirect('Error/e404','location');
        }

        $responseModel = array ( 
            'status' => false,
            'message' => 'No especificado'
        );

		$model = array();
		parse_str($_POST["model"], $model);

		// print_r($model);
		// die();

		try {
			if ($model['nombreUsuario'] != 'XmalMorthen' || $model['pwd'] != '123'){
				throw new Exception('Usuario y/o contraseña incorrecto.');
			}

			//registrar sesión
			$newdata = array(
				'IdUsuario'             => 666,
				'Usuario'				=> $model['nombreUsuario']
			);

			$this->session->set_userdata(SESSIONVAR,$newdata);
			$_SESSION[SESSIONVAR] = $newdata;

			$responseModel = array ( 
				'status' => TRUE,
				'message' => 'Éxito',
				'toGo' => strlen($model['toGo']) > 0 ? base64_decode($model['toGo']) : ''
			);
		} catch (Exception $e) {
			$responseModel['message'] = $e->getMessage();
		}
		
        header('Content-type: application/json');
        echo json_encode( $responseModel );
        exit;
	}

	public function ajaxLogIn2()
	{
		$response = array('status' => 'error', 'message' => array('No especificado'), 'data' => array());
		if ($this->input->server('REQUEST_METHOD') != 'POST') {
			$response['message'] = 'method get not allowed';
		} else {
			$model = array();
			parse_str($_POST["model"], $model);
			$nombreUsuario = $this->input->post('nombreUsuario', true);//'admin@admin.com';
			$password = $this->input->post('password', true);//'password';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nombreUsuario', 'Nombre de usuario', 'required');
			$this->form_validation->set_rules('password', 'Contraseña', 'required');
			if ($this->form_validation->run() === true) {
				if ($this->ion_auth->login($nombreUsuario, $password)) {
					$response['status'] = 'success';
					$response['message'] = array(trim($this->ion_auth->messages()));
					$response['data'] = $this->ion_auth->user()->row();
				} else {
					$response['message'] = array($this->ion_auth->errors());
				}
			} else {
				$response['message'] = $this->form_validation->error_array();
			}
		}
		$response['toGo'] = strlen($model['toGo']) > 0 ? base64_decode($model['toGo']) : '';
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	}


	public function logOut(){		
		$responseModel = array ( 
			'status' => FALSE,
			'message' => 'No especificado'
		);

		try {
			$this->session->unset_userdata(SESSIONVAR);
        	$this->session->sess_destroy(); 
			
			$responseModel['status'] = TRUE;

		} catch (Exception $e) {
			$responseModel['message'] = $e->getMessage();
		}

		if (! $this->input->is_ajax_request()) {
			if ($responseModel['status'] === TRUE) {
				redirect('/');
			} else {
				show_error($responseModel['message'],500);
			}
		}
		
		header('Content-type: application/json');
        echo json_encode( $responseModel );
        exit;
	}

	public function renovateSession($GUID){
        header('Content-type: application/json');
        echo json_encode( $this->config->item('sess_time_to_update') );
        exit;
	}
}
