<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class REPORTES_model extends MY_Model
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

  public function altaElemento($model = null){
    $buid = "EXEC [sp_repAltaEleAct] @CAMPO = '" . $model['ids'] . "', @idDep = '" . $model['ID_ADSCRIPCION'] . "';";
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $response;
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
}