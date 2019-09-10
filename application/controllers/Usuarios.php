<?php defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('breadcrumbs');

    $this->checkAccess();
  }

  private function checkAccess(){
    if ( $_SESSION[SESSIONVAR]['idTipoUsuario'] != 1 && $_SESSION[SESSIONVAR]['idTipoUsuario'] != 2 ){ // solo usuario superadmin y administrador
      redirect('Error/noPrivilegio');
    }
  }


  public function index()
  {

    $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
    $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Administración', site_url('alta/cedula/datosPersonales'));
    $this->session->set_flashdata('titleBody', '[ Usuarios ] - Usuarios - Administración');

    $this->load->model('Usuarios_model');
    $data = array('usuarios'=>array());
    if(verificaPermiso(1) == 1){  #Ver todas las dependencias
      $data['usuarios'] = $this->Usuarios_model->get();
    } else if(verificaPermiso(2) == 1){ #Ver solo de su dependencia	
      $this->load->model('Usuarios_model');
      $usuario = $this->Usuarios_model->user();

      $this->Usuarios_model->where('cat_Usuarios.ID_ADSCRIPCION',$usuario['ID_ADSCRIPCION']);
      $data['usuarios'] = $this->Usuarios_model->get();

    }

    // Utils::pre($data);

    $this->load->library('parser');
    $this->parser->parse('Usuarios/index', $data);
  }

  public function Registro()
  {
    $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
    $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Registro de usuarios - Alta', site_url('alta/cedula/datosPersonales'));
    $this->session->set_flashdata('titleBody', '[ Usuarios ] - Usuarios - Registro de usuarios - Alta');

    $this->load->model('catalogos/CAT_TIPOSUSUARIO_model');
    $data = array(
      'tiposUsuario' => array(),
      'adscripcion' => array()
    );
    if(verificaPermiso(3) == 1){ # Puede dar de alta de todos los tipos de usuario
      $data['tiposUsuario'] = $this->CAT_TIPOSUSUARIO_model->get();
    } else if(verificaPermiso(4) == 1){ # Pueden dar de alta usuarios capturistas, consulta
      $this->CAT_TIPOSUSUARIO_model->where_in('id',array(3,4));
      $data['tiposUsuario'] = $this->CAT_TIPOSUSUARIO_model->get();
    }

    $this->load->model('catalogos/CAT_ADSCRIPCIONES_model');

    if(verificaPermiso(23) == 1){  #Ver todas las dependencias
      $data['adscripcion'] = $this->CAT_ADSCRIPCIONES_model->get();
    } else if(verificaPermiso(24) == 1){ #Ver solo de su dependencia	
      $this->load->model('Usuarios_model');
      $usuario = $this->Usuarios_model->user();
      $this->CAT_ADSCRIPCIONES_model->where('CAT_ADSCRIPCION.clave',$usuario['ID_ADSCRIPCION']);
      $data['adscripcion'] = $this->CAT_ADSCRIPCIONES_model->get();
    }
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
      $this->form_validation->set_message('is_unique', 'El %s ya se encuentra registrado.');
      $this->form_validation->set_message('required', 'Campo obligatorio');
      
      $this->form_validation->set_rules('pCORREO', 'Correo electrónico', 'trim|required|valid_email|is_unique[cat_Usuarios.username]');
      $this->form_validation->set_rules('pCURP', 'CURP', 'trim|required|min_length[18]|max_length[20]|is_unique[cat_Usuarios.CURP]');
      $this->form_validation->set_rules('pCONTRASENA', 'Contraseña', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']');
      // $this->form_validation->set_rules('pID_ADSCRIPCION', 'Adscripción', 'trim|required');

      if ($this->form_validation->run() === true) {
        $email = strtolower($this->input->post('pCORREO'));
        $identity = strtolower($this->input->post('pCORREO'));
        $password = $this->input->post('pCONTRASENA');
        $tipoUsuario = $this->input->post('pTIPO_USUARIO');
        $additional_data = [
          'CURP' => $this->input->post('pCURP')
        ];

        if ( $this->input->post('pID_ADSCRIPCION') ) {
          $additional_data['ID_ADSCRIPCION'] = $this->input->post('pID_ADSCRIPCION');
        }

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
    
    $curp = $this->input->get('curp');

    $this->load->model('Usuarios_model');
    //-->falta corregir este pedaso de codigo aqui creo que es el se saca aprtir del usuario no del la persona que se esta buscando
    $user_id = false;
    if(verificaPermiso(6) == 1){ #Editar usuarios de todas las dependencias
      $user_id = $this->Usuarios_model->getIdUsuarioByCurp($curp);
    }elseif(verificaPermiso(7) == 1){ #Editar solo usuarios de su dependencia	
      $usuario = $this->Usuarios_model->user();
      $this->Usuarios_model->where('ID_ADSCRIPCION',$usuario['ID_ADSCRIPCION']);
      $user_id = $this->Usuarios_model->getIdUsuarioByCurp($curp);
    }

    $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
    $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Modificación de usuarios - Modificar', site_url('alta/cedula/datosPersonales'));
    $this->session->set_flashdata('titleBody', '[ Usuarios ] - Usuarios - Modificación de usuarios - Modificar');

    $data = array();
    $data['user_id'] = $user_id;
    
    $this->load->model('catalogos/CAT_TIPOSUSUARIO_model');
    if(verificaPermiso(3) == 1){ # Puede dar de alta de todos los tipos de usuario
      $data['tiposUsuario'] = $this->CAT_TIPOSUSUARIO_model->get();
    } else if(verificaPermiso(4) == 1){ # Pueden dar de alta usuarios capturistas, consulta
      $this->CAT_TIPOSUSUARIO_model->where_in('id',array(3,4));
      $data['tiposUsuario'] = $this->CAT_TIPOSUSUARIO_model->get();
    }

    if($user_id != false){
    $data['usuario'] = current($this->Usuarios_model->byId($user_id));    
    $this->load->model('catalogos/CAT_ADSCRIPCIONES_model');
    $data['adscripcion'] = $this->CAT_ADSCRIPCIONES_model->byId($data['usuario']['ID_ADSCRIPCION']);
    }

    $this->load->model('catalogos/CAT_ESTATUSUSUARIO_model');
    $data['estatus'] = $this->CAT_ESTATUSUSUARIO_model->get();
    //Utils::pre($data);
    $this->load->library('parser');

    $this->parser->parse('Usuarios/Modificar', $data);
  }

  public function buscarCurp(){
    
    $curp = $this->input->post('pCURP',true);
    $this->db->where('CURP',$curp);
    $this->db->from('vw_Personas');
    $query = $this->db->get();
    $results = $query->row_array();

    if ( $query->num_rows() > 0 ) {
      
      $this->db->where('CURP',$curp);
      $this->db->from('vw_Usuarios');
      $query = $this->db->get();
      $query->row_array();

      if ( $query->num_rows() > 0 ) {

        $response = array(
          'status' => false,
          'message' => 'El usuario ya se encuentra registrado.'
        );

      } else {

        $this->db->where('FOLIO',$results['ID_ALTERNA']);
        $this->db->from('vw_Solicitudes');

        $query = $this->db->get();
        $resultsVw_Solicitudes = $query->row_array();

        if ( $resultsVw_Solicitudes['ESTATUS'] != 1) {
          
          $response = array(
            'status' => false,
            'message' => 'Usuario no encontrado.'
          );

        } else {

          $results['ID_DEPENDENCIA'] = $resultsVw_Solicitudes['ID_DEPENDENCIA'];
          $results['NOMBRE_DPCIA'] = $resultsVw_Solicitudes['NOMBRE_DPCIA'];
          
          $response = array(
            'status' => true,
            'data' => $results
          );
        }
        
      }

    } else {

      $response = array(
        'status' => false,
        'message' => 'Usuario no encontrado.'
      );

    }
    
    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response))
        ->_display();
    exit;
  }

  public function ValidpCORREO($str){
  
    $id = $this->input->post('user_id');

    $this->db->select('email');
    $this->db->from('vw_Usuarios');
    $this->db->where('email',$str);
    $this->db->where('id !=',$id);
    $query = $this->db->get();
    $query->row_array();

    if ( $query->num_rows() > 0 ) {

      $this->form_validation->set_message('ValidpCORREO', 'El correo electrónico ya se encuentra registrado para otro usuario.');
      return false;

    } else {

      return true;

    }

  }


  public function checkExistUserNameEdit($str)
  {    
    $this->load->model('Usuarios_model');
    if ($this->Usuarios_model->checkExistUserNameEdit($this->input->post('user_id'),$str))
    {
      $this->form_validation->set_message('checkExistUserNameEdit', 'El usuario ya se encuentra registrado.');
      return FALSE;
    }
    else
      return TRUE;
  }

  public function guardarModificar()
  {

    $this->load->model('Usuarios_model');
    $curp = $this->input->get('curp');

    $this->load->model('Usuarios_model');

    $user_id = false;
    if(verificaPermiso(10) == 1){ #Editar usuarios de todas las dependencias	
      $user_id = $this->Usuarios_model->getIdUsuarioByCurp($curp);
    }elseif(verificaPermiso(11) == 1){ #Editar solo usuarios de su dependencia	
      $usuario = $this->Usuarios_model->user();
      $this->Usuarios_model->where('ID_ADSCRIPCION',$usuario['ID_ADSCRIPCION']);
      $user_id = $this->Usuarios_model->getIdUsuarioByCurp($curp); 
    }

    $response = array('status' => false, 'message' => array('No especificado'));
    if ($this->input->server('REQUEST_METHOD') != 'POST') {
      $response['message'] = 'method get not allowed';
    } else {
      $this->load->library('form_validation');

      $this->form_validation->set_message('is_unique', 'El usuario %s ya se encuentra registrado.');
      $this->form_validation->set_message('required', 'Campo obligatorio');

      //$this->form_validation->set_rules('pCURP', 'CURP', 'required|min_length[18]|max_length[20]');
      $this->form_validation->set_rules('pCONTRASENA', 'Contraseña', 'trim|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']');
      $this->form_validation->set_rules('pID_ESTATUS', 'Estatus', 'required');
      if($this->input->post('Estatus') == 2){
        $this->form_validation->set_rules('MotivoInactivo', 'Motivo de cambio estatus a Inactivo', 'trim|required');
      }
      // $this->form_validation->set_rules('pCORREO', 'Correo electrónico', 'required|valid_email|is_unique[cat_Usuarios.username]');
      $this->form_validation->set_rules('pCORREO', 'Correo electrónico', 'required|valid_email|callback_checkExistUserNameEdit');
      
      if ($this->form_validation->run() === true) {
        $user_id = $this->input->post('user_id');
        $identity = strtolower($this->input->post('pCORREO'));
        $password = $this->input->post('pCONTRASENA');
        
        $additional_data = [
          'username' => strtolower($this->input->post('pCORREO')),
          'email' => strtolower($this->input->post('pCORREO')),
          'MotivoInactivo' => $this->input->post('MotivoInactivo'),
          'id_EstatusUsuario' => $this->input->post('pID_ESTATUS'),
        ];

        if(strlen(trim($password))>0){
          $additional_data['password'] = $password;
          $additional_data['contrasenaModificada'] = '1';
        }
        if($this->ion_auth->update($user_id, $additional_data)){

          $this->ion_auth->remove_from_group(NULL, $user_id);
          $this->ion_auth->add_to_group($this->input->post('pTIPO_USUARIO'), $user_id);

          $this->load->library('uuid');
          $historico = array(
            'id_UsuarioHistorial' => $this->uuid->v4(),
            'id_Usuario' => $user_id,
            'email' => strtolower($this->input->post('pCORREO')),
            'MotivoInactivo' => $this->input->post('MotivoInactivo'),
            'id_EstatusUsuario' => $this->input->post('pID_ESTATUS'),
            'FechaRegistro' => date('Y-m-d H:i:s'),
            'id_UsuarioModifico' => $this->ion_auth->get_user_id()
          );
          $this->db->insert('cat_UsuarioHistorial',$historico);
          
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

  public function Ver()
  {
    $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/');
    $this->breadcrumbs->push('[ Usuarios ] - Usuarios - Consulta de usuarios - Consulta', site_url('alta/cedula/datosPersonales'));
    $this->session->set_flashdata('titleBody', '[ Usuarios ] - Usuarios - Consulta de usuarios - Consulta');

    $this->load->model('Usuarios_model');
    $curp = $this->input->get('curp');
    $user_id = false;
    if(verificaPermiso(10) == 1){ #Editar usuarios de todas las dependencias	
      $user_id = $this->Usuarios_model->getIdUsuarioByCurp($curp);
    }elseif(verificaPermiso(11) == 1){ #Editar solo usuarios de su dependencia	
      $usuario = $this->Usuarios_model->user();
      $this->Usuarios_model->where('ID_ADSCRIPCION',$usuario['ID_ADSCRIPCION']);
      $user_id = $this->Usuarios_model->getIdUsuarioByCurp($curp); 
    }
    $data = array();
    $data['user_id'] = $user_id;
    $this->load->model('catalogos/CAT_ADSCRIPCIONES_model');
    if($user_id != false){
      $data['usuario'] = current($this->Usuarios_model->byId($user_id));
    }
    $this->load->view('Usuarios/Ver',$data);
  }

  public function darBaja($id = null){
    if (!$id)
				$id = $this->input->post('id');
		
    if (! $this->input->is_ajax_request()) {
      if (ENVIRONMENT == 'production') redirect('Error/e404','location');
    }		

    $response = ['status' => false, 'message' => array('No especificado')];
    try {

      if(!$id){
        throw new rulesException('Parámetros incorrectos');
      }
      
      $additional_data = [
        'id_EstatusUsuario' => 2,
        'MotivoInactivo' => $this->input->post('motivo')
      ];
      if($this->ion_auth->update($id, $additional_data)){

        $this->load->library('uuid');
        $historico = array(
          'id_UsuarioHistorial' => $this->uuid->v4(),
          'id_Usuario' => $id,
          'email' => strtolower($this->input->post('pCORREO')),
          'MotivoInactivo' => $this->input->post('MotivoInactivo'),
          'id_EstatusUsuario' => $this->input->post('pID_ESTATUS'),
          'FechaRegistro' => date('Y-m-d H:i:s'),
          'id_UsuarioModifico' => $this->ion_auth->get_user_id()
        );
        $this->db->insert('cat_UsuarioHistorial',$historico);
        
        $response['status'] = true;
        $response['message'] = $this->lang->line('MSJ5');

      } else {
        
        $response['status'] = false;
        $response['message'] = $this->ion_auth->errors_array();

      }

    } 
    catch (rulesException $e){	
      header("HTTP/1.0 400 " . utf8_decode($e->getMessage()));
    }
    catch (Exception $e) {				
      header("HTTP/1.0 500 " . utf8_decode($e->getMessage()));
      log_message('error',$e->getMessage() . " [ GUID = {$this->config->item('GUID')} ]");
    }
    
    header('Content-type: application/json');
    echo json_encode( $response );
    exit;
  }
}