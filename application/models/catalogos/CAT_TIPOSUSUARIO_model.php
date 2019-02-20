<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CAT_TIPOSUSUARIO_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function select($select = '*')
  {
    $this->db->select($select)
      ->from('grupos');
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
      $this->select('id,name,description');
      $returnResponse = $this->result();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }
  public function byId($id)
  {
    $returnResponse = array();
    try {
      $this->select('id,name,description');
      $this->db->where('grupos.id', $id);
      $returnResponse = $this->row();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }
}
