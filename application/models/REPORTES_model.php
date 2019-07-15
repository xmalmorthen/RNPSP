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

  //Petición Solicitud de baja
  public function PSB($model = null){
    $buid = "EXEC [sp_repAltaEleAct] @CAMPO = '" . $model['ids'] . "', @idDep = '" . $model['ID_ADSCRIPCION'] . "';";
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
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
  
  //Petición Solicitud de examen de confianza
  public function PSEC($model = null){
    $buid = "EXEC [sp_repAltaEleAct] @CAMPO = '" . $model['ids'] . "', @idDep = '" . $model['ID_ADSCRIPCION'] . "';";
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
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

  //Petición Solicitud de curso
  public function PSC($model = null){
    $buid = "EXEC [sp_repAltaEleAct] @CAMPO = '" . $model['ids'] . "', @idDep = '" . $model['ID_ADSCRIPCION'] . "';";
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
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

  //Petición de CUIP
  public function PCUIP($model = null){
    $buid = "EXEC [sp_repAltaEleAct] @CAMPO = '" . $model['ids'] . "', @idDep = '" . $model['ID_ADSCRIPCION'] . "';";
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
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
  
  //Petición de cambio de adscripción
  public function PCA($model = null){
    $buid = "EXEC [sp_repAltaEleAct] @CAMPO = '" . $model['ids'] . "', @idDep = '" . $model['ID_ADSCRIPCION'] . "';";
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
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

  //Petición solicitud de alta
  public function PSA($model = null){
    $buid = "EXEC [sp_repAltaEleAct] @CAMPO = '" . $model['ids'] . "', @idDep = '" . $model['ID_ADSCRIPCION'] . "';";
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
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

  //Respuesta solicitud de baja
  public function RSB($model = null){
    $buid = "EXEC [sp_repAltaEleAct] @CAMPO = '" . $model['ids'] . "', @idDep = '" . $model['ID_ADSCRIPCION'] . "';";
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
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
  
  //Respuesta solicitud de alta
  public function RSA($model = null){
    $buid = "EXEC [sp_repAltaEleAct] @CAMPO = '" . $model['ids'] . "', @idDep = '" . $model['ID_ADSCRIPCION'] . "';";
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
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