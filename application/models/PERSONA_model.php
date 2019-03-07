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

  public function getPersona($curp = null,$id_alterna = null)
  {
    $this->procedure('sp_B1_getPersona');
    $this->addParam('pCURP',$curp,'N',array('rule'=>'trim|min_length[16]|max_length[20]'));
    $this->addParam('pID_ALTERNA',$id_alterna,'',array('rule'=>'trim|numeric'));
    $query = $this->db->query($this->build_query());
    $response = $this->query_row($query);

    // if($response == FALSE){
    //   $this->response['status'] = 0;
    // }else{
    //   $resp = end($response);
    //   $this->response['status'] = (count($response)>0)? 1 : 0;
    //   $this->response['data'] = $response;
    // }
    return  $this->try_result($response);
  }
}
