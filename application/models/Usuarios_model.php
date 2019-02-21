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
      $this->select('cat_Usuarios.id,cat_Usuarios.NOMBRE,cat_Usuarios.PATERNO,cat_Usuarios.MATERNO,cat_EstatusUsuario.Nombre as EstatusUsuario,CAT_ADSCRIPCION_TEMP.ADSCRIPCION',false);
      $this->join('cat_EstatusUsuario','cat_Usuarios.id_EstatusUsuario = cat_EstatusUsuario.id_EstatusUsuario');
      $this->join('CAT_ADSCRIPCION_TEMP','cat_Usuarios.ID_ADSCRIPCION = CAT_ADSCRIPCION_TEMP.ID_ADSCRIPCION');
      $returnResponse = $this->response_list();
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

  // public function byId($idUsuario)
  // {
  //   $returnResponse = array();
  //   try {
  //     $this->usuario('id,NOMBRE,PATERNO,MATERNO,CAT_DEPENDENCIA.DESCRIPCION AS ADSCRIPCION,ID_JEFE AS JEFE');
  //     $this->db->where('usuarios.id', $idUsuario);
  //     $returnResponse = $this->row();
  //   } catch (Exception $e) {
  //     Msg_reporting::error_log($e);
  //   }
  //   return $returnResponse;
  // }



  // public function PermisosById($idUsuario){
  //   $this->db
	// 		->select('1')
	// 		->from('cat_GrupoPermisos')
	// 		->where('cat_GrupoPermisos.id_PermisoMetodo = cat_PermisosMetodo.id_PermisoMetodo')
	// 		->where('cat_GrupoPermisos.id_Grupo',1);
	// 	$subQuery = $this->db->get_compiled_select();

	// 	$this->db
	// 		->select('cat_Controladores.id_Controllador,cat_Controladores.Nombre AS Controlador,cat_Metodos.id_Metodo,cat_Metodos.Nombre AS Metodo,cat_PermisosMetodo.id_PermisoMetodo,cat_PermisosMetodo.Permiso,('.$subQuery.') as acceso')
	// 		->from('cat_Controladores')
	// 		->join('cat_Metodos','cat_Metodos.id_Controllador = cat_Controladores.id_Controllador')
	// 		->join('cat_PermisosMetodo','cat_PermisosMetodo.id_Metodo = cat_Metodos.id_Metodo');
	// 	$query = $this->db->get_compiled_select();
	// 	Utils::pre($query);
  // }
}
