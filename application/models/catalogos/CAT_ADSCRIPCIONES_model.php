<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CAT_ADSCRIPCIONES_model extends MY_Model
{
  public $nombreCatalogo = 'CAT_ADSCRIPCION_TEMP';
  public function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    $returnResponse = array();
    try {
      $this->select('ID_ADSCRIPCION,ADSCRIPCION');
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
      $this->select('ID_ADSCRIPCION,ADSCRIPCION');
      $this->db->where('ID_ADSCRIPCION', $id);
      $returnResponse = $this->response_row();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }
  
}
