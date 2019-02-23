<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CAT_ESTATUSUSUARIO_model extends MY_Model
{
  public $nombreCatalogo = 'cat_EstatusUsuario';
  public function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    $returnResponse = array();
    try {
      $this->select('id_EstatusUsuario,Nombre');
      $returnResponse = $this->response_list();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $returnResponse;
  }
}
