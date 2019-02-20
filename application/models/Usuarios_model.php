<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function usuario($select = 'usuarios.*')
  {
    $this->db->select($select)
      ->from('usuarios')
      ->join('CAT_DEPENDENCIA', 'CAT_DEPENDENCIA.ID_DEPENDENCIA = usuarios.ID_ADSCRIPCION');
  }
  public function row()
  {
    $query = $this->db->get();
    $result = $query->row_array();
    $query->free_result();
    return $result;
  }
  public function result()
  {
    $query = $this->db->get();
    $result = $query->result_array();
    $query->free_result();
    return $result;
  }
  public function get()
  {
    $returnResponse = array();
    try {
      $this->usuario('id,NOMBRE,PATERNO,MATERNO,CAT_DEPENDENCIA.DESCRIPCION AS ADSCRIPCION,ID_JEFE AS JEFE');
      $returnResponse = $this->result();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }
  public function SessionById($idUsuario)
  {
    $returnResponse = array();
    try {
      $this->usuario('usuarios.NOMBRE,usuarios.PATERNO,usuarios.MATERNO,CAT_DEPENDENCIA.DESCRIPCION AS ADSCRIPCION,CAT_DEPENDENCIA.ID_DEPENDENCIA as ID_ADSCRIPCION');
      $this->db->where('usuarios.id', $idUsuario);
      $returnResponse = $this->row();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }
  public function byId($idUsuario)
  {
    $returnResponse = array();
    try {
      $this->usuario('id,NOMBRE,PATERNO,MATERNO,CAT_DEPENDENCIA.DESCRIPCION AS ADSCRIPCION,ID_JEFE AS JEFE');
      $this->db->where('usuarios.id', $idUsuario);
      $returnResponse = $this->row();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }
}
