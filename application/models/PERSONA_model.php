<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PERSONA_model extends MY_Model
{

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

  public function sp_getPersonal($curp = null)
  {
    $this->procedure('sp_getPersonal');
    $this->addParam('pCURP',$curp,'N',array('rule'=>'trim|min_length[16]|max_length[20]'));
    $query = $this->db->query($this->build_query());
    $response = $this->query_list($query);
    return  $this->try_result($response);
  }
}
