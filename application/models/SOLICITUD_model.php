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
  /*
  * @method sp_B2_DG_addReferencias - Agraga la informacion de las referencias de la persona				
  */
  public function addReferencias($model){

    $this->arrayToPost($model);
    $_POST['ID_ALTERNA'] = 4;//ID_ALTERNA_Referencias

    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','ID_ALTERNA');
    $this->addParam('pID_ESTADO_EMISOR','pID_ESTADO_EMISOR_Referencias','',array('rule'=>'trim|numeric'));
    $this->addParam('pID_EMISOR','pID_EMISOR_Referencias','',array('rule'=>'trim|numeric'));
    $this->addParam('pID_TIPO_REFERENCIA','ID_TIPO_REFERENCIA','',array('name'=>'Tipo de referencia','rule'=>'trim|numeric'));
    $this->addParam('pID_OCUPACION','OCUPACION','',array('name'=>'Ocupación','rule'=>'trim|numeric'));
    $this->addParam('pNOMBRE','NOMBRE_REFERENCIAS','N',array('name'=>'Nombre','rule'=>'trim|required|max_length[30]'));
    $this->addParam('pPATERNO','PATERNO_REFERENCIAS','N',array('name'=>'Apellido paterno','rule'=>'trim|required|max_length[30]'));
    $this->addParam('pMATERNO','MATERNO_REFERENCIAS','N',array('name'=>'Apellido materno','rule'=>'trim|max_length[30]'));
    $this->addParam('pSEXO','SEXO_REFERENCIAS','N',array('name'=>'Sexo','rule'=>'trim|max_length[1]'));
    $this->addParam('pID_RELACION','ID_RELACION_REFERENCIAS','',array('name'=>'','rule'=>'trim|numeric'));
    $this->addParam('pID_TIPO_DOM',NULL); //NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pID_PAIS',NULL); //NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pCALLE','CALLE_REFERENCIAS','N',array('name'=>'Calle','rule'=>'trim|max_length[60]'));
    $this->addParam('pCOLONIA','COLONIA_REFERENCIAS','N',array('name'=>'Colonia/localidad','rule'=>'trim|max_length[60]'));
    $this->addParam('pNUM_EXTERIOR','NUM_EXTERIOR_REFERENCIAS','N',array('name'=>'Número exterior','rule'=>'trim|max_length[30]'));
    $this->addParam('pNUM_INTERIOR','NUM_INTERIOR_REFERENCIAS','N',array('name'=>'Número interior','rule'=>'trim|max_length[30]'));
    $this->addParam('pTELEFONO',NULL); //NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pID_ENTIDAD','ID_ENTIDAD_REFERENCIAS','',array('name'=>'Entidad federativa','rule'=>'trim|numeric'));
    $this->addParam('pID_MUNICIPIO','ID_MUNICIPIO_REFERENCIAS','',array('name'=>'Municipio','rule'=>'trim|numeric'));
    $this->addParam('pENTRE_CALLE','ENTRE_CALLE_REFERENCIAS','N',array('name'=>'Entre calle de ','rule'=>'trim|max_length[60]'));
    $this->addParam('pY_CALLE','Y_CALLE_REFERENCIAS','N',array('name'=>'Y la calle de ','rule'=>'trim|max_length[45]'));
    $this->addParam('pCODIGO_POSTAL','CODIGO_POSTAL_REFERENCIAS','N',array('name'=>'Código postal','rule'=>'trim|max_length[100]'));
    $this->addParam('pCIUDAD','CIUDAD_REFERENCIAS','N',array('name'=>'CiudadCiudad','rule'=>'trim|max_length[50]'));
    
    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B2_DG_addReferencias');
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
  /*
  * $this->addParam('method sp_B2_DG_addSocioEconomico - Agraga el niviel socioeconomico de la persona
  */
  public function addSocioEconomico($model){

    $this->arrayToPost($model);
    $_POST['ID_ALTERNA'] = 4;//ID_ALTERNA_Socioeconomico

    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','ID_ALTERNA');
    $this->addParam('pID_ESTADO_EMISOR','pID_ESTADO_EMISOR_Socioeconomico','',array('rule'=>'trim|numeric'));
    $this->addParam('pID_EMISOR','pID_EMISOR_Socioeconomico','',array('rule'=>'trim|numeric'));

    $this->addParam('pVIVE_FAMILIA','VIVE_FAMILIA','',array('name'=>'¿Vive con su familia?','rule'=>'trim'));
    $this->addParam('pINGRESO_FAMILIAR','INGRESO_FAMILIAR','',array('name'=>'Ingreso familiar adicional (mensual)','rule'=>'trim|numeric'));
    $this->addParam('pID_TIPO_DOMIC','ID_TIPO_DOMICILIO','',array('name'=>'Su domicilio es','rule'=>'trim|numeric'));
    $this->addParam('pACTIVIDAD_CULTURAL','ACTIVIDAD_CULTURAL','',array('name'=>'Actividades culturales o deportivas que practica','rule'=>'trim'));
    $this->addParam('pINMUEBLES','INMUEBLES','',array('name'=>'Especificación de inmuebles y costos','rule'=>'trim'));
    $this->addParam('pINVERSIONES','INVERSIONES','',array('name'=>'Inversión y monto aproximado','rule'=>'trim'));
    $this->addParam('pNUMERO_AUTOS','NUMERO_AUTOS','',array('name'=>'Vehículo y costo aproximado','rule'=>'trim'));
    $this->addParam('pCALIDAD_VIDA','CALIDAD_VIDA','',array('name'=>'Calidad de vida','rule'=>'trim'));
    $this->addParam('pVICIOS','VICIOS','',array('name'=>'Vicios','rule'=>'trim'));
    $this->addParam('pIMAGEN_PUBLICA','IMAGEN_PUBLICA','',array('name'=>'Imágen pública','rule'=>'trim'));
    $this->addParam('pRESPONSABLE_CORP',null); // no se encontro en el formulario
    $this->addParam('pCOMPORTA_SOCIAL','COMPORTA_SOCIAL','',array('name'=>'Comportamiento social ','rule'=>'trim'));
    
    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B2_DG_addSocioEconomico');
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

  /*
  * $this->addParam('method sp_B2_DG_addDependiente - Agrega los datos de las personas dependientes del elemento				
  */
  public function addDependiente($model){
    $this->arrayToPost($model);
    $_POST['ID_ALTERNA'] = 4;//ID_ALTERNA_Socioeconomico

    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','ID_ALTERNA');
    $this->addParam('pID_ESTADO_EMISOR','pID_ESTADO_EMISOR_Socioeconomico','',array('rule'=>'trim|numeric'));
    $this->addParam('pID_EMISOR','pID_EMISOR_Socioeconomico','',array('rule'=>'trim|numeric'));

    $this->addParam('pPATERNO','PATERNO_SOCIOECONOMICOS','',array('name'=>'Apellido paterno','rule'=>'trim|required'));
    $this->addParam('pMATERNO','MATERNO_SOCIOECONOMICOS','',array('name'=>'Apellido materno','rule'=>'trim'));
    $this->addParam('pFECHA_NAC','FECHA_NAC_SOCIOECONOMICOS','',array('name'=>'Fecha de nacimiento','rule'=>'trim|required'));
    $this->addParam('pSEXO','SEXO_SOCIOECONOMICOS','',array('name'=>'Sexo','rule'=>'trim|required'));
    $this->addParam('pNOMBRE','NOMBRE_SOCIOECONOMICOS','',array('name'=>'Nombre','rule'=>'trim|required'));
    $this->addParam('pID_SUBTIPO_REF','ID_RELACION','',array('name'=>'Parentesco','rule'=>'trim|numeric'));
    $this->addParam('pID_TIPO_DEPENDIENT','ID_RELACION_SOCIOECONOMICOS','',array('name'=>'Relación ','rule'=>'trim|numeric'));
    
    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B2_DG_addDependiente');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');
      Utils::pre($this->build_query()); 
      // retorna
      // Debe exsitir un registro sobre datos sobre el entorno socioeconómico del elemento, para poder registrar los depedientes
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

  /*
  * $this->addParam('method sp_B2_LAB_addEmpleoSeg - Agraga la información de los empleos anteriores en seguridad pública del elemento.
  */
  public function  sp_B2_LAB_addEmpleoSeg($model){
    $this->arrayToPost($model);
    $_POST['ID_ALTERNA'] = 4;//pID_ALTERNA_Adscripcion_actual

    $this->load->library('form_validation'  );

    $this->addParam('pID_ALTERNA','ID_ALTERNA');
    $this->addParam('pID_ESTADO_EMISOR','pID_ESTADO_EMISOR_Adscripcion_actual','',array('rule'=>'trim|numeric'));
    $this->addParam('pID_EMISOR','pID_EMISOR_Adscripcion_actual','',array('rule'=>'trim|numeric'));

    $this->addParam('pID_DEPENDENCIA','_dependenciaAdscripcionActual','',array('rule'=>'trim'));
    $this->addParam('pID_DOC_BAJA','pID_DOC_BAJA_Adscripcion_actual','',array('rule'=>'trim'));
    $this->addParam('pID_ENTIDAD','pID_ENTIDAD_ADSCRIPCION_ACTUAL','',array('rule'=>'trim'));
    $this->addParam('pID_MUNICIPIO','pID_MUNICIPIO_ADSCRIPCION_ACTUAL','',array('rule'=>'trim'));
    $this->addParam('pID_MOTIVO_MOV_LAB',null,'',array('rule'=>'trim')); //NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pID_TIPO_MOV_LAB',NULL,'',array('rule'=>'trim|numeric'));//NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pID_AREA','pID_AREA','',array('rule'=>'trim|numeric'));
    $this->addParam('pID_PUESTO',null,'',array('rule'=>'trim|numeric'));//NO LO ENCONTRE EN EL MODEL
    $this->addParam('pID_INSTITUCION','pINSTITUCION','',array('rule'=>'trim|numeric')); //
    $this->addParam('pID_TIPO_CONTRATO','pID_TIPO_CONTRATO_Adscripcion_actual','',array('rule'=>'trim'));
    $this->addParam('pFECHA_INGRESO','pFECHA_INGRESO','',array('rule'=>'trim'));
    $this->addParam('pESPECIALIDAD','pESPECIALIDAD','',array('rule'=>'trim'));
    $this->addParam('pRANGO','pRANGO','',array('rule'=>'trim'));
    $this->addParam('pSUELDO_BASE','pSUELDO_BASE','',array('rule'=>'trim'));
    $this->addParam('pID_NIVEL_MANDO','pID_NIVEL_MANDO','',array('rule'=>'trim'));
    $this->addParam('pCOMPENSACION','pCOMPENSACION','',array('rule'=>'trim'));
    $this->addParam('pNUMERO_PLACA','pNUMERO_PLACA','',array('rule'=>'trim'));
    $this->addParam('pNUMERO_EXPEDIENTE','pNUMERO_EXPEDIENTE','',array('rule'=>'trim'));
    $this->addParam('pID_TIPO_BAJA','pID_DOC_BAJA_Adscripcion_actual','',array('rule'=>'trim'));
    $this->addParam('pFECHA_BAJA',null,'',array('rule'=>'trim'));//NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pOBSERVACION_BAJA',null,'',array('rule'=>'trim'));//NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pFUNCIONES','pFUNCIONES','',array('rule'=>'trim'));
    $this->addParam('pNUMERO_EMPLEADO',null,'',array('rule'=>'trim'));//NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pID_CATEGORIA_PUEST','pID_CATEGORIA_PUEST_Adscripcion_actual','',array('rule'=>'trim|numeric'));
    $this->addParam('pID_JERARQUIA_PUEST','pID_JERARQUIA_PUEST_Adscripcion_actual','',array('rule'=>'trim|numeric'));
    $this->addParam('pID_FUNCION_PUESTO',null,'',array('rule'=>'trim'));//NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pID_AMBITO_PUESTO','pID_AMBITO_PUESTO_Adscripcion_actual','',array('rule'=>'trim|numeric'));
    $this->addParam('pDIVISION','pDIVISION','',array('rule'=>'trim'));
    $this->addParam('pID_JEFE','ID_JEFE','',array('name'=>'CUIP del jefe inmediato','rule'=>'trim|numeric'));

    

    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B2_LAB_addEmpleoSeg');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');
      //Cannot insert the value NULL into column 'ID_ESTADO_EMISOR', table 'zzhpregpersonalc4.zzhpregpersc4.EMPLEOS_SEG'; column does not allow nulls. INSERT fails. (515)
      Utils::pre($this->build_query()); 

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
