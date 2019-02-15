<?php defined('BASEPATH') or exit('No direct script access allowed');

class UserSession extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('language');
		$this->lang->load('auth');
	}

	public function index()
	{
		// TITLE BODY PAGE
		$this->session->set_flashdata('titleBody', 'Iniciar sesión');
		// /TITLE BODY PAGE

		// CONFIGURATIONS
		$this->session->set_flashdata('noLayout', true);
		// /CONFIGURATIONS

		$model['toGo'] = $this->input->get('toGo');

		$this->load->view('Session/logInView', $model);
	}

	/*
	 * 	@method POST ajaxLogIn()
	 *	@param 'nombreUsuario' string
	 *	@param 'password' string
	 *	@return status [error|success]
	 * 	@return message 
	 * 	@return data [datos del usuario]
	 */
	public function ajaxLogIn()
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

	public function logOut()
	{
		$response = array(
			'status' => false,
			'message' => 'No especificado'
		);

		try {
			$this->session->unset_userdata(SESSIONVAR);
			$this->session->sess_destroy();

			$response['status'] = true;

		} catch (Exception $e) {
			$response['message'] = $e->getMessage();
		}

		if (!$this->input->is_ajax_request()) {
			if ($response['status'] === true) {
				redirect('/');
			} else {
				show_error($response['message'], 500);
			}
		}

		header('Content-type: application/json');
		echo json_encode($response);
		exit;
	}

	public function renovateSession($GUID)
	{
		header('Content-type: application/json');
		echo json_encode($this->config->item('sess_time_to_update'));
		exit;
	}
}
