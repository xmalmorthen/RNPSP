<?php defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('breadcrumbs');
  }


  public function index()
  {
    $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
    $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Administración', site_url('alta/cedula/datosPersonales'));
    $this->session->set_flashdata('titleBody', '[ Usuarios ] - Usuarios - Administración');

    $this->load->model('Usuarios_model');
    $data['usuarios'] = $this->Usuarios_model->get();

    $this->load->library('parser');
    $this->parser->parse('Usuarios/index', $data);
  }

  public function Registro()
  {
    $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
    $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Registro de usuarios - Alta', site_url('alta/cedula/datosPersonales'));
    $this->session->set_flashdata('titleBody', '[ Usuarios ] - Usuarios - Registro de usuarios - Alta');

		$this->load->model('catalogos/CAT_TIPOSUSUARIO_model');
    $data['tiposUsuario'] = $this->CAT_TIPOSUSUARIO_model->get();

    $this->load->model('catalogos/CAT_ADSCRIPCIONES_model');
    $data['adscripcion'] = $this->CAT_ADSCRIPCIONES_model->get();

    $this->load->library('parser');
    $this->parser->parse('Usuarios/Registro', $data);
  }
  
  public function guardar()
  {
    $response = array('status' => false, 'message' => array('No especificado'));
    if ($this->input->server('REQUEST_METHOD') != 'POST') {
      $response['message'] = 'method get not allowed';
    } else {
      $this->load->library('form_validation');
      $this->form_validation->set_message('required', 'Campo obligatorio');
      $this->form_validation->set_rules('pCURP', 'CURP', 'required|min_length[18]|max_length[20]');
      $this->form_validation->set_rules('pNOMBRE', 'Nombre', 'required|min_length[2]|max_length[30]');
      $this->form_validation->set_rules('pPATERNO', 'Apellido paterno', 'required|min_length[1]|max_length[30]');
      $this->form_validation->set_rules('pMATERNO', 'Apellido materno', 'trim|min_length[1]|max_length[30]');
      $this->form_validation->set_rules('pID_ADSCRIPCION', 'Adscripción', 'required');
      $this->form_validation->set_rules('pCONTRASENA', 'Contraseña', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']');
      $this->form_validation->set_rules('pTIPO_USUARIO', 'Correo electrónico', 'required');
      $this->form_validation->set_rules('pCORREO', 'Correo electrónico', 'required|valid_email');
      $this->form_validation->set_rules('pID_JEFE', 'Jefe inmediato', 'trim');

      if ($this->form_validation->run() === true) {
        $email = strtolower($this->input->post('pCORREO'));
        $identity = strtolower($this->input->post('pCORREO'));
        $password = $this->input->post('pCONTRASENA');
        $tipoUsuario = $this->input->post('pTIPO_USUARIO');
        $additional_data = [
          'CURP' => $this->input->post('pCURP'),
          'NOMBRE' => $this->input->post('pNOMBRE'),
          'PATERNO' => $this->input->post('pPATERNO'),
          'MATERNO' => $this->input->post('pMATERNO'),
          'ID_ADSCRIPCION' => $this->input->post('pID_ADSCRIPCION')
        ];
        if ($this->ion_auth->register($identity, $password, $email, $additional_data, array($tipoUsuario))) {
          $response['status'] = true;
          $response['message'] = $this->lang->line('MSJ5');
        } else {
          $response['status'] = false;
          $response['message'] = $this->ion_auth->errors_array();
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

  public function Modificar()
  {
    $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
    $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Modificación de usuarios - Modificar', site_url('alta/cedula/datosPersonales'));
    $this->session->set_flashdata('titleBody', '[ Usuarios ] - Usuarios - Modificación de usuarios - Modificar');

    $this->load->model('catalogos/CAT_TIPOSUSUARIO_model');
    $data['tiposUsuario'] = $this->CAT_TIPOSUSUARIO_model->get();

    $this->load->model('catalogos/CAT_ADSCRIPCIONES_model');
    $data['adscripcion'] = $this->CAT_ADSCRIPCIONES_model->get();

    $this->load->library('parser');
    $this->parser->parse('Usuarios/Modificar', $data);
  }


  public function Ver()
  {

    // BREADCRUMB
    $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
    $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Consulta de usuarios - Consulta', site_url('alta/cedula/datosPersonales'));
    // /BREADCRUMB

    // TITLE BODY PAGE
    $this->session->set_flashdata('titleBody', '[ Usuarios ] - Usuarios - Consulta de usuarios - Consulta');
    // /TITLE BODY PAGE

    $this->load->view('Usuarios/Ver');
  }
}



 