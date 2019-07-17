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
    $response = array('status' => false, 'message' => array('No especificado'),'pregunta'=>array());

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

          $this->db->select('contrasenaModificada');
          $this->db->from('cat_Usuarios');
          $this->db->where('id',$user['id']);

          $query = $this->db->get();
          $responsesSel = $query->row_array();
          $this->session->set_userdata('contadorIntentos',0);
          $preguntas = array(
              1=>'¿Cuál es el nombre de la mamá de tu mamá?',
              2=>'¿Cuál es el nombre del papá de tu papá?',
              3=>'¿Cuál es el nombre de tu mamá?',
              4=>'¿Cómo te llamaban en tu familia cuando eras niño?',
              5=>'¿En qué ciudad conociste a tu esposo(a), novio(a)?',
              6=>'¿Quién era el mejor amigo en infancia?',
              7=>'¿Porque calle vivías cuando tenías 10 años?',
              8=>'¿Cuál es la fecha de nacimiento de tu hermano mayor?',
              9=>'¿Cuál es el segundo nombre de tu hijo menor?',
              10=>'¿Cuál es el nombre de tu hermano mayor?'
          );

          $DB1 = $this->load->database('default', TRUE);
          $DB1->from('de_RespuestasPreguntas');
          $idPregunta = 'Pregunta'.$this->input->post('idPreguntaSeguridad');
          $respuestaPreg = $this->input->post('preguntaSeguridad');
          
          // echo "<pre>";
          // var_dump (array($idPregunta => $respuestaPreg,'id_Usuario'=>$idUsuario));
          // echo "</pre>";
          // exit();
          
          // $this->db->where('Pregunta'.$this->input->post('idPreguntaSeguridad'),$this->input->post('preguntaSeguridad'));
          // $this->db->where(array($idPregunta => $respuestaPreg));
          $DB1->where(array('id_Usuario'=>$user['id']));
          //utils::pre($this->db->last_query());
          $responseDB = $DB1->count_all_results();
          utils::pre($DB1->last_query());
          $DB1->close();


          $numPregunta = rand(1, 10);
          $response['pregunta'] = array(
              'cambioContrasena' => ($responseDB == 0)? 1: $responsesSel['contrasenaModificada'],
              'pregunta' => $preguntas[$numPregunta],
              'idPregunta' => $numPregunta,
              'modal' => $this->load->view('Session/preguntas',array(
                'pregunta' => $preguntas[$numPregunta],
                'idPregunta' => $numPregunta
              ),true)
          );



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
