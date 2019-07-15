<?php defined('BASEPATH') or exit('No direct script access allowed');

class UserSession extends CI_Controller
{

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

  public function ajaxLogIn()
  {
    $response = array('status' => false, 'message' => array('No especificado'));

    if (!$this->input->is_ajax_request()) {
      redirect('Error/e404', 'location');
    }

    $responseModel = array(
      'status' => false,
      'message' => 'No especificado'
    );

    $model = array();
    parse_str($_POST["model"], $model);
    $_POST['nombreUsuario'] = $model['nombreUsuario'];
    $_POST['password'] = $model['pwd'];


    if ($this->input->server('REQUEST_METHOD') != 'POST') {
      $response['message'] = 'method get not allowed';
    } else {
      $model = array();
      parse_str($_POST["model"], $model);
      $nombreUsuario = $this->input->post('nombreUsuario', true); //'admin@admin.com';
      $password = $this->input->post('password', true); //'password';

      $this->load->library('form_validation');
      $this->form_validation->set_rules('nombreUsuario', 'Nombre de usuario', 'required');
      $this->form_validation->set_rules('password', 'Contraseña', 'required');

      if ($this->form_validation->run() === true) {
        if ($this->ion_auth->login($nombreUsuario, $password)) {
          $response['status'] = true;
          $response['message'] = array(trim($this->ion_auth->messages()));

          $user_id = $this->ion_auth->get_user_id();
          $this->load->model('Usuarios_model');
          $user = $this->Usuarios_model->SessionById($user_id);

          if ($user['borrado'] == 1){
            $response['status'] = false;
            $response['message'] = array("No se ha podido iniciar sesión");
          }

          $session = $this->session->local_userdata();
          $this->session->local_set_userdata($user);
          $this->session->local_set_userdata(array_merge($session, $user));
        } else {
          $response['message'] = array($this->ion_auth->errors());
        }
      } else {
        $response['message'] = $this->form_validation->error_array();
      }
    }
    $response['message'] = count($response['message']) > 1 ? ul($response['message']) : current($response['message']);
    $response['toGo'] = strlen($model['toGo']) > 0 ? base64_decode($model['toGo']) : '';

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response))
      ->_display();
    exit;
  }

  public function logOut()
  {
    $responseModel = array(
      'status' => false,
      'message' => 'No especificado'
    );

    try {
      $this->session->unset_userdata(SESSIONVAR);
      $this->session->sess_destroy();

      $responseModel['status'] = true;
    } catch (Exception $e) {
      $responseModel['message'] = $e->getMessage();
    }

    if (!$this->input->is_ajax_request()) {
      if ($responseModel['status'] === true) {
        redirect('/');
      } else {
        show_error($responseModel['message'], 500);
      }
    }

    header('Content-type: application/json');
    echo json_encode($responseModel);
    exit;
  }

  public function renovateSession($GUID)
  {
    header('Content-type: application/json');
    echo json_encode($this->config->item('sess_time_to_update'));
    exit;
  }

  public function Qpass_gen(){
    $pass = $this->ion_auth->reset_password('Consultas','123456');
    Utils::pre($pass,false);
    Utils::pre($this->ion_auth->errors(),false);
    Utils::pre($this->ion_auth->messages());
    
  }
}
