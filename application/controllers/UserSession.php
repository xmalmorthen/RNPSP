<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserSession extends CI_Controller {

	public function index()
	{
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
}
