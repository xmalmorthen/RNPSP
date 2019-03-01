<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SOLICITUD_model extends MY_Model
{
  public $response = array();
  public function __construct()
  {
    parent::__construct();
    $this->respinse = array(
      'status' => false,
      'message'=> '',
      'data'=> null
    );
  }

  public function arrayToPost($model){
    if(is_array($model)){
      foreach ($model as $key => $value) {
        $_POST[$key] = $value;
      }
    }
  }

  public function addDatosPersonales($model){
    
    $this->arrayToPost($model);
    $this->load->library('form_validation');
    $this->form_validation->set_rules('pTIPO_MOV', 'Tipo de movimiento', 'trim|required|max_length[3]');
    $this->form_validation->set_rules('pID_PAIS_NAC', 'País de nacimiento', 'trim|required|numeric|max_length[10]');
    $this->form_validation->set_rules('pNOMBRE_DATOS_PERSONALES', 'Nombre', 'trim|required|max_length[40]');
    $this->form_validation->set_rules('pPATERNO_DATOS_PERSONALES', 'Apellido paterno', 'trim|required|max_length[40]');
    $this->form_validation->set_rules('pMATERNO_DATOS_PERSONALES', 'Apellido materno', 'max_length[40]');
    $this->form_validation->set_rules('pID_ENTIDAD_NAC', 'Estado de nacimiento', 'trim|required|numeric');
    $this->form_validation->set_rules('pID_MUNICIPIO_NAC', 'Municipio de nacimiento', 'trim|required|numeric');
    $this->form_validation->set_rules('pID_ESTADO_CIVIL', 'Estado civil', 'trim|required|numeric');
    $this->form_validation->set_rules('pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES', 'Fecha de nacimiento', 'trim|required');
    //$this->form_validation->set_rules('pSEXO_DATOS_PERSONALES', 'Sexo', 'trim|required|max_length[1]'); //NO SE ENCONTRO
    $this->form_validation->set_rules('pCURP', 'CURP', 'trim|required|max_length[20]');
    //$this->form_validation->set_rules('pRFC', '', 'numeric|max_length[10]'); //NO SE ENCONTRO
    $this->form_validation->set_rules('pCREDENCIAL_LECTOR', 'Clave de elector', 'trim|max_length[30]');
    $this->form_validation->set_rules('pCARTILLA_SMN', 'Cartilla del SMN', 'trim|max_length[20]');
    $this->form_validation->set_rules('pLICENCIA_DATOS_PERSONALES', 'Licencia de conducir', 'trim|max_length[20]');
    $this->form_validation->set_rules('pPASAPORTE', 'Pasaporte', 'trim|max_length[20]');
    $this->form_validation->set_rules('pMODO_NACIONALIDAD', 'Modo de nacionalidad', 'trim|required|numeric');
    $this->form_validation->set_rules('pID_NACIONALIDAD', 'Nacionalidad', 'trim|required|numeric');
    //$this->form_validation->set_rules('pNIDEPERSON', '', 'numeric'); //envial NULL
    $this->form_validation->set_rules('pLICENCIA_VIG', 'Vigencia de licencia', 'trim');
    $this->form_validation->set_rules('pCIUDAD_NAC_DATOS_PERSONALES', 'Descripción ciudad de nacimiento', 'trim|max_length[50]');
    $this->form_validation->set_rules('pFECHA_NACIONALIDAD', 'Fecha de nacionalidad', 'trim');
    $this->form_validation->set_rules('CIB', 'CIB', 'trim|max_length[50]');
    $this->form_validation->set_rules('motivoCIB', 'Motivo de cambio de CIB', 'trim|max_length[300]');

    if ($this->form_validation->run() === true) {

      $this->procedure('sp_addDatosPersonales');
      $this->addParam('pTIPO_OPERACION','pTIPO_MOV');
      $this->addParam('pID_PAIS_NAC','pID_PAIS_NAC');
      $this->addParam('pNOMBRE','pNOMBRE_DATOS_PERSONALES','N');
      $this->addParam('pPATERNO','pPATERNO_DATOS_PERSONALES','N');
      $this->addParam('pMATERNO','pMATERNO_DATOS_PERSONALES','N');
      $this->addParam('pID_ENTIDAD_NAC','pID_ENTIDAD_NAC');
      $this->addParam('pID_MUNICIPIO_NAC','pID_MUNICIPIO_NAC');
      $this->addParam('pID_ESTADO_CIVIL','pID_ESTADO_CIVIL');
      $this->addParam('pFECHA_NAC','pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES');
      // $this->addParam('pSEXO','pSEXO_DATOS_PERSONALES','N');
      $this->addParam('pSEXO',null);
      $this->addParam('pCURP','pCURP','N');
      $this->addParam('pRFC',null,'N');
      $this->addParam('pCREDENCIAL_ELECTOR','pCREDENCIAL_LECTOR','N');
      $this->addParam('pCARTILLA_SMN','pCARTILLA_SMN','N');
      $this->addParam('pLICENCIA','pLICENCIA_DATOS_PERSONALES','N');
      $this->addParam('pPASAPORTE','pPASAPORTE','N');
      $this->addParam('pMODO_NACIONALIDAD','pMODO_NACIONALIDAD');
      $this->addParam('pID_NACIONALIDAD','pID_NACIONALIDAD');
      $this->addParam('pNIDEPERSON',null);
      $this->addParam('pLICENCIA_VIG','pLICENCIA_VIG');
      $this->addParam('pCIUDAD_NAC','pCIUDAD_NAC_DATOS_PERSONALES','N');
      $this->addParam('pFECHA_NACIONALIDAD','pFECHA_NACIONALIDAD');
      $this->addParam('pCIB','CIB','N');
      $this->addParam('pMotivoCIB','motivoCIB','N');

      $this->iniParam('pID_ALTERNA','NUMERIC');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');

      $query = $this->db->query($this->build_query());
      $response = $this->query_row($query);

      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
      }else{
        $this->response['status'] = $response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
        $this->response['data'] = array('ID_ALTERNA'=>$response['ID_ALTERNA']);
        
      }
    } else {
      $this->response['status'] = false;
      $this->response['message'] = $this->form_validation->error_array();
    }
    return $this->response;
  }


  public function addNivelEstudios($model){

    $this->arrayToPost($model);
    $_POST['ID_ALTERNA'] = 4;
    
    $this->load->library('form_validation');
    // $this->form_validation->set_rules('pID_ALTERNA', 'Máxima escolaridad', 'numeric|max_length[10]');
    // $this->form_validation->set_rules('pID_ESTADO_EMISOR', 'Máxima escolaridad', 'numeric|max_length[10]');
    // $this->form_validation->set_rules('pID_EMISOR', 'Máxima escolaridad', 'numeric|max_length[10]');
    $this->form_validation->set_rules('pID_GRADO_ESCOLAR', 'Máxima escolaridad', 'numeric');
    $this->form_validation->set_rules('pESPECIALIDAD_DESARROLLO', 'Máxima escolaridad', 'trim|max_length[100]');
    $this->form_validation->set_rules('pNOMBRE_ESCUELA', 'Máxima escolaridad', 'trim|max_length[100]');
    $this->form_validation->set_rules('pCEDULA_PROFESIONAL', 'Máxima escolaridad', 'numeric');
    $this->form_validation->set_rules('pINICIO', 'Máxima escolaridad', 'trim');
    $this->form_validation->set_rules('pTERMINO', 'Máxima escolaridad', 'trim');
    $this->form_validation->set_rules('pREGISTRO_SEP', 'Máxima escolaridad', 'trim|max_length[1]');
    $this->form_validation->set_rules('pFOLIO_CERTIFICADO', 'Máxima escolaridad', 'trim|max_length[30]');
    $this->form_validation->set_rules('pPROMEDIO', 'Máxima escolaridad', 'numeric|max_length[10]');

    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B1_addNivelEstudios');

      // $this->addParam('pID_ALTERNA',$model['ID_ALTERNA_Desarrollo']);
      $this->addParam('pID_ALTERNA','ID_ALTERNA');
      //$this->addParam('pID_ESTADO_EMISOR',$model['pID_ESTADO_EMISOR_Desarrollo']); //Enviar vacio
      $this->addParam('pID_ESTADO_EMISOR',null); //Enviar vacio
      //$this->addParam('pID_EMISOR',$model['pID_EMISOR_Desarrollo']); //Enviar vacio
      $this->addParam('pID_EMISOR',null); //Enviar vacio•
      $this->addParam('pID_GRADO_ESCOLAR','pID_GRADO_ESCOLAR');
      $this->addParam('pESPECIALIDAD','pESPECIALIDAD_DESARROLLO','N');
      $this->addParam('pNOMBRE_ESCUELA','pNOMBRE_ESCUELA','N');
      $this->addParam('pCEDULA_PROFESIONAL','pCEDULA_PROFESIONAL');
      $this->addParam('pINICIO','pINICIO');
      $this->addParam('pTERMINO','pTERMINO');
      $this->addParam('pREGISTRO_SEP','pREGISTRO_SEP','N');
      $this->addParam('pFOLIO_CERTIFICADO','pFOLIO_CERTIFICADO','N');
      $this->addParam('pPROMEDIO','pPROMEDIO');

      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');

      $query = $this->db->query($this->build_query());
      $response = $this->query_row($query);

      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->response['status'] = false;
      $this->response['message'] = $this->form_validation->error_array();
    }
    return $this->response;

  }

  public function addDomicilio($model){

    $this->arrayToPost($model);
    $_POST['ID_ALTERNA'] = 4;

    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('ID_ALTERNA', 'hidden', 'numeric');
    $this->form_validation->set_rules('pID_ESTADO_EMISOR_Domicilio', 'hidden', 'numeric');
    $this->form_validation->set_rules('pID_EMISOR_Domicilio', 'hidden', 'numeric');
    $this->form_validation->set_rules('pID_TIPO_DOM', '', 'numeric');// NO SE ENCONTRO formulario
    $this->form_validation->set_rules('pID_PAIS', '', 'numeric');// NO SE ENCONTRO formulario
    $this->form_validation->set_rules('pCALLE_DOMICILIO', 'Calle', 'trim|max_length[60]');
    $this->form_validation->set_rules('pCOLONIA_DOMICILIO', 'Colonia/Localidad', 'trim|max_length[60]');
    $this->form_validation->set_rules('pNUM_EXTERIOR_DOMICILIO', 'Número exterior', 'trim|max_length[30]');
    $this->form_validation->set_rules('pNUM_INTERIOR_DOMICILIO', 'Número interior', 'trim|max_length[30]');
    $this->form_validation->set_rules('pTELEFONO_DOMICILIO', 'Número telefónico', 'trim|max_length[20]');
    $this->form_validation->set_rules('pID_ENTIDAD_DOMICILIO', 'Estado', 'numeric');
    $this->form_validation->set_rules('pID_MUNICIPIO_DOMICILIO', 'Municipio', 'numeric');
    $this->form_validation->set_rules('pENTRE_CALLE_DOMICILIO', 'Entre la calle de', 'trim|max_length[60]');
    $this->form_validation->set_rules('pY_CALLE_DOMICILIO', 'Y la calle de', 'trim|max_length[10]');
    $this->form_validation->set_rules('pCODIGO_POSTAL_DOMICILIO', 'Código postal', 'trim|max_length[50]');
    $this->form_validation->set_rules('pCIUDAD_DOMICILIO', 'Ciudad', 'trim|max_length[100]');

    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B1_addDomicilio');

      $this->addParam('pID_ALTERNA','ID_ALTERNA');
      $this->addParam('pID_ESTADO_EMISOR','pID_ESTADO_EMISOR_Domicilio');
      $this->addParam('pID_EMISOR','pID_EMISOR_Domicilio');
      $this->addParam('pID_TIPO_DOM',null); // NO SE ENCONTRO formulario
      $this->addParam('pID_PAIS',null); // NO SE ENCONTRO formulario
      $this->addParam('pCALLE','pCALLE_DOMICILIO','N');
      $this->addParam('pCOLONIA','pCOLONIA_DOMICILIO','N');
      $this->addParam('pNUM_EXTERIOR','pNUM_EXTERIOR_DOMICILIO','N');
      $this->addParam('pNUM_INTERIOR','pNUM_INTERIOR_DOMICILIO','N');
      $this->addParam('pTELEFONO','pTELEFONO_DOMICILIO','N');
      $this->addParam('pID_ENTIDAD','pID_ENTIDAD_DOMICILIO');
      $this->addParam('pID_MUNICIPIO','pID_MUNICIPIO_DOMICILIO');
      $this->addParam('pENTRE_CALLE','pENTRE_CALLE_DOMICILIO','N');
      $this->addParam('pY_CALLE','pY_CALLE_DOMICILIO','N');
      $this->addParam('pCODIGO_POSTAL','pCODIGO_POSTAL_DOMICILIO','N');
      $this->addParam('pCIUDAD','pCIUDAD_DOMICILIO','N');

      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');

      $query = $this->db->query($this->build_query());
      $response = $this->query_row($query);

      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->response['status'] = false;
      $this->response['message'] = $this->form_validation->error_array();
    }
    return $this->response;

  }
}
