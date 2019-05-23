<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class EXAMEN_model extends MY_Model
{
  public $nombreCatalogo = 'vw_Solicitudes';
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

  public function getInfo($id){
    $this->arrayToPost( [ 'pCURP' => null, 'pID_ALTERNA' => $id ]);
    
    $this->procedure('sp_B1_vwPersona');
    $this->addParam('pCURP',NULL,'');
    $this->addParam('pID_ALTERNA',$id,'');
    
    $call = $this->build_query();
    $query = $this->db->query($call);
    $response = $this->query_row($query);

    if($response == FALSE){
      $this->response['status'] = false;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
    }else{
      $this->response['status'] = true;
      $this->response['data'] = $response;
    }

    return $this->response;
  }

  public function validar($model){
    $this->arrayToPost($model);
    
    $this->procedure('sp_addRegistroExamen');
    $this->addParam('pID_ALTERNA','pID_ALTERNA','');
    $this->addParam('pLUGAR','pLUGAR','');
    $this->addParam('pHORA_EXAMEN','pHORA_EXAMEN','');
    $this->addParam('pFECHA_EXAMEN','pFECHA_EXAMEN','');
    $this->addParam('pESTATUS_EXAMEN','pESTATUS_EXAMEN','');
    $this->addParam('pVIGENCIA_EXAMEN','pVIGENCIA_EXAMEN','');
    $this->iniParam('txtError','varchar','250');
    $this->iniParam('msg','varchar','80');
    $this->iniParam('tranEstatus','int');
    
    $call = $this->build_query();
    $query = $this->db->query($call);
    $response = $this->query_row($query);

    if($response == FALSE){
      $this->response['status'] = false;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
    }else{
      $this->response['status'] = (bool)$response['tranEstatus'];
      $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
    }

    return $this->response;
  }
}