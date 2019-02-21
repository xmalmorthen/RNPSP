<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CAT_TIPOSUSUARIO_model extends MY_Model
{
  public $nombreCatalogo = 'cat_TiposUsuario';
  public function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    $returnResponse = array();
    try {
      $this->select('id,name,description');
      $returnResponse = $this->response_list();
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
      $this->db->where(($this.nombreCatalogo).'.id', $id);
      $returnResponse = $this->response_row();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }

}
