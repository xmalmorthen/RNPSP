<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends MY_Model
{

  public $nombreCatalogo = 'cat_Usuarios';
  public function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    $returnResponse = array();
    try {
      $this->select('cat_Usuarios.id,cat_Usuarios.NOMBRE,cat_Usuarios.PATERNO,cat_Usuarios.MATERNO,cat_EstatusUsuario.Nombre as EstatusUsuario,CAT_ADSCRIPCION_TEMP.ADSCRIPCION', false);
      $this->join('cat_EstatusUsuario', 'cat_Usuarios.id_EstatusUsuario = cat_EstatusUsuario.id_EstatusUsuario');
      $this->join('CAT_ADSCRIPCION_TEMP', 'cat_Usuarios.ID_ADSCRIPCION = CAT_ADSCRIPCION_TEMP.ID_ADSCRIPCION');
      $returnResponse = $this->response_list();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }

  public function byId($usuario = false)
  {
    $idUsuario = ($usuario != false) ? $usuario : $this->currentUser();
    $returnResponse = array();
    try {
      $this->select('cat_Usuarios.id,cat_Usuarios.CURP,cat_Usuarios.email,cat_Usuarios.NOMBRE,cat_Usuarios.PATERNO,cat_Usuarios.MATERNO,cat_EstatusUsuario.Nombre as EstatusUsuario,CAT_ADSCRIPCION_TEMP.ADSCRIPCION,CAT_ADSCRIPCION_TEMP.ID_ADSCRIPCION', false);
      $this->join('cat_EstatusUsuario', 'cat_Usuarios.id_EstatusUsuario = cat_EstatusUsuario.id_EstatusUsuario');
      $this->join('CAT_ADSCRIPCION_TEMP', 'cat_Usuarios.ID_ADSCRIPCION = CAT_ADSCRIPCION_TEMP.ID_ADSCRIPCION');
      $this->where('cat_Usuarios.id', $idUsuario);
      $returnResponse = $this->response_row();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }

  public function SessionById($idUsuario)
  {
    $returnResponse = array();
    try {
      //$this->select('cat_Usuarios.NOMBRE,cat_Usuarios.PATERNO,cat_Usuarios.MATERNO,null AS ADSCRIPCION,null as ID_ADSCRIPCION');
      $this->select();
      $this->where('cat_Usuarios.id', $idUsuario);
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
    $_usuario = ($usuario == false) ? $this->currentUser() : $controlador;
    $_controlador = ($controlador == false) ? _CONTROLLER : $controlador;
    $_metodo = ($metodo == false) ? _METHOD : $metodo;

    $this->db->select('CASE when zzhpregpersc4.fn_verificaAdscripcionUsuario(' . $_usuario . ',cat_PermisosMetodo.id_PermisoMetodo) = 1 THEN 1 WHEN zzhpregpersc4.fn_verificaExistePermiso(' . $_usuario . ',cat_PermisosMetodo.id_PermisoMetodo) = 1 THEN 1 ELSE 0 END', false);
    $subQuery = $this->db->get_compiled_select();
    $this->db
      ->select('cat_PermisosMetodo.id_PermisoMetodo as id_Permiso,cat_PermisosMetodo.Permiso,(' . $subQuery . ') as acceso')
      ->from('cat_Controladores')
      ->join('cat_Metodos', 'cat_Metodos.id_Controllador = cat_Controladores.id_Controllador')
      ->join('cat_PermisosMetodo', 'cat_PermisosMetodo.id_Metodo = cat_Metodos.id_Metodo')
      ->where('cat_Controladores.Nombre', $_controlador)
      ->where('cat_Metodos.Nombre', $_metodo);
    return $this->response_list();
  }
  public function PermisosByUsuarioTab($usuario = false, $controlador = false, $metodo = false)
  {
    $_usuario = ($usuario == false) ? $this->currentUser() : $controlador;
    $_controlador = ($controlador == false) ? _CONTROLLER : $controlador;
    $_metodo = ($metodo == false) ? _METHOD : $metodo;

    $this->db->select('CASE when zzhpregpersc4.fn_verificaAdscripcionUsuario(' . $_usuario . ',cat_PermisosMetodo.id_PermisoMetodo) = 1 THEN 1 WHEN zzhpregpersc4.fn_verificaExistePermiso(' . $_usuario . ',cat_PermisosMetodo.id_PermisoMetodo) = 1 THEN 1 ELSE 0 END', false);
    $subQuery = $this->db->get_compiled_select();
    $this->db
      ->select('cat_Controladores.id_Controllador,cat_Controladores.Nombre AS Controlador,cat_Metodos.TieneTabs,cat_Metodos.id_Metodo,cat_Metodos.Nombre AS Metodo,cat_TabsMetodo.id_tabMetodo as id_Tab,cat_TabsMetodo.Nombre as Tab,cat_PermisosMetodo.id_PermisoMetodo as id_Permiso,cat_PermisosMetodo.Permiso,(' . $subQuery . ') as acceso')
      ->from('cat_Controladores')
      ->join('cat_Metodos', 'cat_Metodos.id_Controllador = cat_Controladores.id_Controllador')
      ->join('cat_PermisosMetodo', 'cat_PermisosMetodo.id_Metodo = cat_Metodos.id_Metodo')
      ->join('cat_TabsMetodo', 'cat_PermisosMetodo.id_tabMetodo = cat_TabsMetodo.id_tabMetodo', 'left')
      ->where('cat_Controladores.Nombre', $_controlador)
      ->where('cat_Metodos.Nombre', $_metodo);
    return $this->response_list();
  }
}
