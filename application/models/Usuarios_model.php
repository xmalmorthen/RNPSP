<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends MY_Model
{

  public $nombreCatalogo = 'cat_Usuarios';
  public $response = array();

  public function __construct()
  {
    parent::__construct();
    $this->response = array(
      'status' => false,
      'message'=> '',
      'validation' => false,
      'data'=> null
    );
  }

  public function get()
  {
    $returnResponse = array();
    try {
      $this->db->select("id,NOMBRE,CURP,PATERNO,MATERNO,email,MotivoInactivo,id_EstatusUsuario,DescEstatus as EstatusUsuario,ID_ADSCRIPCION,DescAdscripcion as ADSCRIPCION,CONCAT(NOMBRE_JEFE,' ',PATERNO_JEFE,' ',MATERNO_JEFE) as JEFE", false);
      $this->db->from('vw_Usuarios');
      $returnResponse = $this->response_list();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    // Utils::pre($this->db->last_query());
    return $returnResponse;
  }

  public function byId($usuario = false)
  {
    $idUsuario = ($usuario != false) ? $usuario : $this->currentUser();
    $returnResponse = array();
    try {
      
      $this->where('id', $idUsuario);
      $returnResponse = $this->get();
      
      $this->db->select('idTipoUsuario,TipoUsuario');
      $this->db->from('vw_Usuarios');
      $this->db->where('id', $idUsuario);
      $tipoUsuario = $this->response_row();

      if ($tipoUsuario){
        $returnResponse[0]['idTipoUsuario'] = $tipoUsuario['idTipoUsuario'];
        $returnResponse[0]['TipoUsuario'] = $tipoUsuario['TipoUsuario'];
      }

    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }

  public function SessionById($idUsuario)
  {
    $returnResponse = array();
    try {
      $this->db->select('cat_Usuarios.id,cat_Usuarios.ip_address,cat_Usuarios.username,cat_Usuarios.email,cat_Usuarios.last_login,cat_Usuarios.id_EstatusUsuario,cat_Usuarios.CURP,cat_Usuarios.ID_ADSCRIPCION,cat_Usuarios.borrado,vw_Personas.NOMBRE,vw_Personas.PATERNO,vw_Personas.MATERNO');
      $this->db->from('vw_Personas');
      $this->db->join('cat_Usuarios','cat_Usuarios.CURP = vw_Personas.CURP','right');
      $this->db->where('cat_Usuarios.id', $idUsuario);
      $returnResponse = $this->response_row();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }

  public function currentUser()
  {
    return $this->ion_auth->get_user_id();
  }

  public function user()
  {
    return $this->ion_auth->user()->row_array();
  }

  public function getIdUsuarioByCurp($curp){
    $this->db->select('id')
      ->from('vw_Usuarios')
      ->where('CURP', trim($curp));
    $response = $this->response_row();
    return (is_array($response) && count($response) > 0) ? current($response) : $response;
  }

  public function tipoUsuarioByUsuario($usuario = false)
  {
    $idUsuario = ($usuario != false) ? $usuario : $this->currentUser();
    return $this->ion_auth->get_users_groups($idUsuario)->row_array();
  }

  public function PermisosTieneTabs($controlador = false, $metodo = false)
  {
    $_controlador = ($controlador == false) ? _CONTROLLER : $controlador;
    $_metodo = ($metodo == false) ? _METHOD : $metodo;

    $this->db->select('cat_Metodos.TieneTabs')
      ->from('cat_Metodos')
      ->join('cat_Controladores', 'cat_Metodos.id_Controllador = cat_Controladores.id_Controllador')
      ->where('cat_Controladores.Nombre', $_controlador)
      ->where('cat_Metodos.Nombre', $_metodo);
    $response = $this->response_row();
    return (is_array($response) && count($response) > 0) ? current($response) : $response;
  }

  public function PermisosByUsuario($usuario = false, $controlador = false, $metodo = false)
  {
    $_usuario = ($usuario == false) ? $this->currentUser() : NULL;
    $_controlador = ($controlador == false) ? _CONTROLLER : $controlador;
    $_metodo = ($metodo == false) ? _METHOD : $metodo;

    $this->addParam('idUsuario',$_usuario);
    $this->addParam('controlador',$_controlador);
    $this->addParam('metodo',$_metodo);
    $this->procedure('getPermisosUsuario');
    $query = $this->db->query($this->build_query());
    $response = $this->query_list($query);
    return $response;

    // $this->db->select('CASE when fn_verificaAdscripcionUsuario(' . $_usuario . ',cat_PermisosMetodo.id_PermisoMetodo) = 1 THEN 1 WHEN fn_verificaExistePermiso(' . $_usuario . ',cat_PermisosMetodo.id_PermisoMetodo) = 1 THEN 1 ELSE 0 END', false);
    // $subQuery = $this->db->get_compiled_select();
    // $this->db
    //   ->select('cat_PermisosMetodo.id_PermisoMetodo as id_Permiso,cat_PermisosMetodo.Permiso,(' . $subQuery . ') as acceso')
    //   ->from('cat_Controladores')
    //   ->join('cat_Metodos', 'cat_Metodos.id_Controllador = cat_Controladores.id_Controllador')
    //   ->join('Permisos','cat_Metodos.id_Metodo = Permisos.id_Metodo')
    //   ->join('cat_PermisosMetodo', 'Permisos.id_PermisoMetodo = cat_PermisosMetodo.id_PermisoMetodo')
    //   ->where('cat_Controladores.Nombre', $_controlador)
    //   ->where('cat_Metodos.Nombre', $_metodo);
    // return $this->response_list();
  }
  public function PermisosByUsuarioTab($usuario = false, $controlador = false, $metodo = false)
  {
    $_usuario = ($usuario == false) ? $this->currentUser() : null;
    $_controlador = ($controlador == false) ? _CONTROLLER : $controlador;
    $_metodo = ($metodo == false) ? _METHOD : $metodo;

    $this->addParam('idUsuario',$_usuario);
    $this->addParam('controlador',$_controlador);
    $this->addParam('metodo',$_metodo);
    $this->procedure('getPermisosUsuarioTabs');
    $query = $this->db->query($this->build_query());
    $response = $this->query_list($query);
    return $response;

    // $this->db->select('CASE when fn_verificaAdscripcionUsuario(' . $_usuario . ',cat_PermisosMetodo.id_PermisoMetodo) = 1 THEN 1 WHEN fn_verificaExistePermiso(' . $_usuario . ',cat_PermisosMetodo.id_PermisoMetodo) = 1 THEN 1 ELSE 0 END', false);
    // $subQuery = $this->db->get_compiled_select();
    // $this->db
    //   ->select('cat_Controladores.id_Controllador,cat_Controladores.Nombre AS Controlador,cat_Metodos.TieneTabs,cat_Metodos.id_Metodo,cat_Metodos.Nombre AS Metodo,cat_TabsMetodo.id_tabMetodo as id_Tab,cat_TabsMetodo.Nombre as Tab,cat_PermisosMetodo.id_PermisoMetodo as id_Permiso,cat_PermisosMetodo.Permiso,(' . $subQuery . ') as acceso')
    //   ->from('cat_Controladores')
    //   ->join('cat_Metodos', 'cat_Metodos.id_Controllador = cat_Controladores.id_Controllador')
    //   ->join('Permisos','cat_Metodos.id_Metodo = Permisos.id_Metodo')
    //   ->join('cat_PermisosMetodo', 'Permisos.id_PermisoMetodo = cat_PermisosMetodo.id_PermisoMetodo')
    //   ->join('cat_TabsMetodo', 'cat_PermisosMetodo.id_tabMetodo = cat_TabsMetodo.id_tabMetodo', 'left')
    //   ->where('cat_Controladores.Nombre', $_controlador)
    //   ->where('cat_Metodos.Nombre', $_metodo);
    // return $this->response_list();
  }

  # ****************************************************************************************************************
  # Alta de usuario
  # ****************************************************************************************************************
  # Obtiene los datos del a persona que se va a dar de alta como usuario
  public function  sp_getDatosNewUsr(){
    
    $this->load->library('form_validation');
    $this->addParam('pCURP','pCURP','',array('rule'=>'trim|required'));
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_getDatosNewUsr');
      $build = $this->build_query();
      $query = $this->db->query($build);
      $response = $this->query_row($query);
      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
      }else{
        $this->response['status'] = true;
        $this->response['message'] = '';
        $this->response['data'] = $response;
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }
}
