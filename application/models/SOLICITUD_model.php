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

  public function addDatosPersonales($model){

    $this->procedure('sp_addDatosPersonales');

    $this->addParam('pTIPO_OPERACION',$model['pTIPO_MOV'],'N');
    $this->addParam('pID_PAIS_NAC',$model['pID_PAIS_NAC']);
    $this->addParam('pNOMBRE',$model['pNOMBRE_DATOS_PERSONALES'],'N');
    $this->addParam('pPATERNO',$model['pPATERNO_DATOS_PERSONALES'],'N');
    $this->addParam('pMATERNO',$model['pMATERNO_DATOS_PERSONALES'],'N');
    $this->addParam('pID_ENTIDAD_NAC',$model['pID_ENTIDAD_NAC']);
    $this->addParam('pID_MUNICIPIO_NAC',$model['pID_MUNICIPIO_NAC']);
    $this->addParam('pID_ESTADO_CIVIL',$model['pID_ESTADO_CIVIL']);
    $this->addParam('pFECHA_NAC',$model['pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES']);
    // $this->addParam('pSEXO',$model['pSEXO_DATOS_PERSONALES'],'N');
    $this->addParam('pSEXO',null);
    $this->addParam('pCURP',$model['pCURP'],'N');
    $this->addParam('pRFC',null,'N');
    $this->addParam('pCREDENCIAL_ELECTOR',$model['pCREDENCIAL_LECTOR'],'N');
    $this->addParam('pCARTILLA_SMN',$model['pCARTILLA_SMN'],'N');
    $this->addParam('pLICENCIA',$model['pLICENCIA_DATOS_PERSONALES'],'N');
    $this->addParam('pPASAPORTE',$model['pPASAPORTE'],'N');
    $this->addParam('pMODO_NACIONALIDAD',$model['pMODO_NACIONALIDAD']);
    $this->addParam('pID_NACIONALIDAD',$model['pID_NACIONALIDAD']);
    $this->addParam('pNIDEPERSON',null);
    $this->addParam('pLICENCIA_VIG',$model['pLICENCIA_VIG']);
    $this->addParam('pCIUDAD_NAC',$model['pCIUDAD_NAC_DATOS_PERSONALES'],'N');
    $this->addParam('pFECHA_NACIONALIDAD',$model['pFECHA_NACIONALIDAD']);
    $this->addParam('pCIB',$model['CIB'],'N');
    $this->addParam('pMotivoCIB',$model['motivoCIB'],'N');

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
      $this->response['data'] = $response['ID_ALTERNA'];
      
    }
    return $this->response;
  }


  public function addNivelEstudios($model){

    $this->modelToPost($model);
    
    $this->load->library('form_validation');
    $this->form_validation->set_message('required', 'Campo obligatorio');
    $this->form_validation->set_rules('pID_GRADO_ESCOLAR', 'Máxima escolaridad', 'numeric|max_length[10]');
    

    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B1_addNivelEstudios');

      // $this->addParam('pID_ALTERNA',$model['ID_ALTERNA_Desarrollo']);
      $this->addParam('pID_ALTERNA',4);
      //$this->addParam('pID_ESTADO_EMISOR',$model['pID_ESTADO_EMISOR_Desarrollo']); //Enviar vacio
      $this->addParam('pID_ESTADO_EMISOR',null); //Enviar vacio
      //$this->addParam('pID_EMISOR',$model['pID_EMISOR_Desarrollo']); //Enviar vacio•
      $this->addParam('pID_EMISOR',null); //Enviar vacio•
      $this->addParam('pID_GRADO_ESCOLAR',$model['pID_GRADO_ESCOLAR']);
      $this->addParam('pESPECIALIDAD',$model['pESPECIALIDAD_DESARROLLO'],'N');
      $this->addParam('pNOMBRE_ESCUELA',$model['pNOMBRE_ESCUELA'],'N');
      $this->addParam('pCEDULA_PROFESIONAL',$model['pCEDULA_PROFESIONAL']);
      $this->addParam('pINICIO',$model['pINICIO']);
      $this->addParam('pTERMINO',$model['pTERMINO']);
      $this->addParam('pREGISTRO_SEP',$model['pREGISTRO_SEP'],'N');
      $this->addParam('pFOLIO_CERTIFICADO',$model['pFOLIO_CERTIFICADO'],'N');
      $this->addParam('pPROMEDIO',$model['pPROMEDIO']);

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
