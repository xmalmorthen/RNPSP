<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CURSO_model extends MY_Model
{
  public $nombreCatalogo = 'vw_Solicitudes'; //'vw_SolSinCurso';
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

  public function get(){
    $this->select('FOLIO,NOMBRE,PATERNO,MATERNO,FECHA_REGISTRO,TIPO_OPERACION,DESCRIPCION,ESTATUS,DESCRIPCION_ESTATUS,ID_DEPENDENCIA,NOMBRE_DPCIA');
    // $this->where('ID_DEPENDENCIA', $this->session->userdata(SESSIONVAR)['ID_ADSCRIPCION']);
    return $this->response_list();
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
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      $this->response['status'] = true;
      $this->response['data'] = $response;
    }

    return $this->response;
  }

  public function validar($model){
    $this->arrayToPost($model);
    
    $this->procedure('sp_addRegistroCurso');
    $this->addParam('pID_ALTERNA','pID_ALTERNA','');
    $this->addParam('pID_CURSO','pID_CURSO','');
    $this->addParam('pID_DEPENDENCIA','pID_DEPENDENCIA','');
    $this->addParam('pESTATUS_CURSO','pESTATUS_CURSO','');
    $this->addParam('pFECHA_INICIO','pFECHA_INICIO','');
    $this->addParam('pFECHA_FIN','pFECHA_FIN','');
    $this->addParam('pVIGENCIA','pVIGENCIA','');
    $this->iniParam('txtError','varchar','250');
    $this->iniParam('msg','varchar','80');
    $this->iniParam('tranEstatus','int');
    
    $call = $this->build_query();
    $query = $this->db->query($call);
    $response = $this->query_row($query);

    if($response == FALSE){
      $this->response['status'] = false;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      $this->response['status'] = (bool)$response['tranEstatus'];
      $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
    }

    return $this->response;
  }
}