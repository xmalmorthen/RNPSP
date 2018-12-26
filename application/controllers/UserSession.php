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

		$this->load->view('Session/logInView');
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

		//registrar sesión
		$newdata = array(
			'IdUsuario'             => 666
		);

		$this->session->set_userdata(SESSIONVAR,$newdata);
		$_SESSION[SESSIONVAR] = $newdata;

		$responseModel = array ( 
            'status' => TRUE,
            'message' => 'Éxito'
        );

        header('Content-type: application/json');
        echo json_encode( $responseModel );
        exit;
	}
}
