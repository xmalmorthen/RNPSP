<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SOLICITUD_model extends MY_Model
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

  public function get(){
    $this->select('FOLIO,NOMBRE,PATERNO,MATERNO,FECHA_REGISTRO,TIPO_OPERACION,DESCRIPCION,ESTATUS,DESCRIPCION_ESTATUS,ID_DEPENDENCIA,NOMBRE_DPCIA');
    
//die(var_dump($this->session->userdata(SESSIONVAR)));

    if (verificaTipoUsuarioSesion() == 1){ // usuario super admin
      
      $this->where('tipo_operacion', 'AS'); // tipo de movimiento AS      
      $this->where('ESTATUS', '7'); // mostrar solo solicitudes que están en estatus concluida      
      $this->where('ID_DEPENDENCIA is null', NULL, FALSE); // mostrar solo solicitudes que tengan dependencia registrada

      $list = $this->response_list();

      //TODO: agregar filtro "Las solicitudes creadas por el usuario que pertenece al C4 o sea SuperAdministrador deberán mostrarse en el listado aunque su estatus sea PENDIENTE."
      
      // $this->where('DpciaUsr', '999'); // mostrar solo solicitudes que tengan dependencia de usuario 999 Super Admin
      // $this->where('ESTATUS', '6'); // mostrar solo solicitudes que están en estatus pendiente


    } else {
      
      $this->where('tipo_operacion', 'AS'); // tipo de movimiento AS
      $this->where('ID_DEPENDENCIA', $this->session->userdata(SESSIONVAR)['ID_ADSCRIPCION']); // de su dependencia
      $this->where('ESTATUS', '6'); // mostrar solo solicitudes que están en estatus pendiente

      $list = $this->response_list();

    }

    return $list;
  }

  public function eliminarSolicitud($model){

    $model['pIdUsr'] = $this->session->userdata(SESSIONVAR)['user_id'];

    $this->arrayToPost($model);
    
    $this->procedure('sp_cancelaSol');
    $this->addParam('pID_ALTERNA','id','');    
    $this->addParam('pMOTIVO','motivo','');
    $this->addParam('pIdUsr','pIdUsr','');
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
      $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : ( strlen($response['txtError']) > 0 ? $response['txtError'] : $response['msg'])  . " [ GUID = {$this->config->item('GUID')} ]";
    }

    return $this->response;

  }

  /*
  * "Opcion Nueva Solicitud - Validar CURP sp_validaCURP- Valida si una CURP se encuentra ya registrada o no. SI está, regresa la informacion de los datos personales"
  * El procedimiento almacenado esta retornando dos resultados
  * actualizar procedimiento almacenado
  */
  public function sp_validaCURP($CURP){

    $this->procedure('sp_validaCURP');
    $this->addParam('pCURP',$CURP,'N',array('name'=>'CURP','rule'=>'trim|required|min_length[16]|max_length[20]'));    
    $this->addParam('pCURP_USR',$this->session->userdata(SESSIONVAR)['CURP'],'N',array('name'=>'CURP','rule'=>'trim|required|min_length[16]|max_length[20]'));

    $this->iniParam('tranEstatus','int');
    $this->iniParam('msg','varchar','80');

    //$build = $this->build_query();

    $response = (array)$this->query_multi($this->build_query());

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $responseSelect = current($response);
        $responseOutput = end($response);
  
        if ($responseOutput['tranEstatus'] == 1) {

          if ($responseSelect['TIPO_OPERACION'] == 'CE'){

            $this->response['status'] = 2;
            $this->response['message'] = 'CURP ya replicada';
          } else {

            $this->response['status'] = $responseOutput['tranEstatus'];
            $this->response['message'] = $responseOutput['msg'];
            $this->response['data'] = $this->try_result($responseSelect);  

          }

        } else {

          $this->response['status'] = $responseOutput['tranEstatus'];
          $this->response['message'] = $responseOutput['msg'];
          $this->response['data'] = $this->try_result($responseSelect);

        }
      }else{
        $responseOutput = current($response);
        $this->response['status'] = $responseOutput['tranEstatus'];
        $this->response['message'] = $responseOutput['msg'];
      }
    }
    return $this->response;
  }
  
  /*
  * "Opcion Nueva Solicitud - Boton Gurdar CIB sp_B1_addPersonaCIB - Agraga un nuevo CIB a una persona"
  */
  public function  sp_B1_addPersonaCIB($model){
    $this->arrayToPost($model);

    $this->load->library('form_validation'  );
    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pCIB','CIB','N',array('rule'=>'trim|max_length[50]'));
    $this->addParam('pMotivoCIB','motivoCIB','N',array('rule'=>'trim|max_length[300]'));

    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B1_addPersonaCIB');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');
      
      $query = $this->db->query($this->build_query());
      $response = $this->query_row($query);

      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }
  
  public function  sp_B1_getPersona($idAlterna = null,$curp = null){
    $this->procedure('sp_B1_getPersona');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  public function  sp_cmbTipoOperacion($curp = null){
    $this->procedure('sp_cmbTipoOperacion');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pCURP_USR',$this->session->userdata(SESSIONVAR)['CURP'],'N');

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opción Nueva Solicitud - GRID de CIB
  # sp_B1_getPersonaCIB
  public function sp_B1_getPersonaCIB($idAlterna = null,$curp = null){

    $this->procedure('sp_B1_getPersonaCIB');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  public function addDatosPersonales($model){

    $model['pCURP_USR'] = $this->session->userdata(SESSIONVAR)['CURP'];

    $this->arrayToPost($model);
    $this->load->library('form_validation');
    $this->form_validation->set_rules('pTIPO_OPERACION', 'Tipo de movimiento', 'trim|required|max_length[3]');

    $allValidateDatosPersonales = array_key_exists('allValidateDatosPersonales', $model) ? $model['allValidateDatosPersonales'] : 'true';

    if ( $allValidateDatosPersonales == 'true' ) {

      $this->form_validation->set_rules('pID_PAIS_NAC', 'País de nacimiento', 'trim|required|numeric|max_length[10]');
      $this->form_validation->set_rules('pNOMBRE_DATOS_PERSONALES', 'Nombre', 'trim|required|max_length[40]');
      $this->form_validation->set_rules('pPATERNO_DATOS_PERSONALES', 'Apellido paterno', 'trim|required|max_length[40]');
      $this->form_validation->set_rules('pMATERNO_DATOS_PERSONALES', 'Apellido materno', 'max_length[40]');
      $this->form_validation->set_rules('pID_ENTIDAD_NAC', 'Estado de nacimiento', 'trim|required|numeric');
      $this->form_validation->set_rules('pID_MUNICIPIO_NAC', 'Municipio de nacimiento', 'trim|required|numeric');
      $this->form_validation->set_rules('pID_ESTADO_CIVIL', 'Estado civil', 'trim|required|numeric');
      $this->form_validation->set_rules('pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES', 'Fecha de nacimiento', 'trim|required');
      $this->form_validation->set_rules('pSEXO_DATOS_PERSONALES', 'Sexo', 'trim|required|max_length[1]');
      $this->form_validation->set_rules('pCURP', 'CURP', 'trim|required|max_length[20]');
      $this->form_validation->set_rules('pRFC', 'pRFC_DOMICILIO', 'max_length[20]');
      $this->form_validation->set_rules('pCREDENCIAL_ELECTOR', 'Clave de elector', 'trim|max_length[30]');
      $this->form_validation->set_rules('pCARTILLA_SMN', 'Cartilla del SMN', 'trim|max_length[20]');
      $this->form_validation->set_rules('pLICENCIA_DATOS_PERSONALES', 'Licencia de conducir', 'trim|max_length[20]');
      $this->form_validation->set_rules('pPASAPORTE', 'Pasaporte', 'trim|max_length[20]');
      $this->form_validation->set_rules('pMODO_NACIONALIDAD', 'Modo de nacionalidad', 'trim|required|numeric');
      $this->form_validation->set_rules('pID_NACIONALIDAD', 'Nacionalidad', 'trim|required|numeric');
      //$this->form_validation->set_rules('pNIDEPERSON', '', 'numeric'); //envial NULL
      $this->form_validation->set_rules('pLICENCIA_VIG', 'Vigencia de licencia', 'trim');
      $this->form_validation->set_rules('pCIUDAD_NAC_DATOS_PERSONALES', 'Descripción ciudad de nacimiento', 'trim|required|max_length[50]');
      $this->form_validation->set_rules('pFECHA_NACIONALIDAD', 'Fecha de nacionalidad', 'trim');
      $this->form_validation->set_rules('pCUIP', 'CUIP', 'trim|max_length[50]');

    }

    if ($this->form_validation->run() === true) {

      $this->procedure('sp_addDatosPersonales');
      $this->addParam('pTIPO_OPERACION','pTIPO_OPERACION');
      $this->addParam('pID_PAIS_NAC','pID_PAIS_NAC');
      $this->addParam('pNOMBRE','pNOMBRE_DATOS_PERSONALES','N');
      $this->addParam('pPATERNO','pPATERNO_DATOS_PERSONALES','N');
      $this->addParam('pMATERNO','pMATERNO_DATOS_PERSONALES','N');
      $this->addParam('pID_ENTIDAD_NAC','pID_ENTIDAD_NAC');
      $this->addParam('pID_MUNICIPIO_NAC','pID_MUNICIPIO_NAC');
      $this->addParam('pID_ESTADO_CIVIL','pID_ESTADO_CIVIL');
      $this->addParam('pFECHA_NAC','pFECHA_NAC_SOCIOECONOMICOS_DATOS_PERSONALES');
      $this->addParam('pSEXO','pSEXO_DATOS_PERSONALES','N');
      $this->addParam('pCURP','pCURP','N');
      $this->addParam('pRFC','pRFC_DOMICILIO','N');
      $this->addParam('pCREDENCIAL_ELECTOR','pCREDENCIAL_ELECTOR','N');
      $this->addParam('pCARTILLA_SMN','pCARTILLA_SMN','N');
      $this->addParam('pLICENCIA','pLICENCIA_DATOS_PERSONALES','N');
      $this->addParam('pPASAPORTE','pPASAPORTE','N');
      $this->addParam('pMODO_NACIONALIDAD','pMODO_NACIONALIDAD');
      $this->addParam('pID_NACIONALIDAD','pID_NACIONALIDAD');
      $this->addParam('pNIDEPERSON',null);//envial NULL 
      $this->addParam('pLICENCIA_VIG','pLICENCIA_VIG');
      $this->addParam('pCIUDAD_NAC','pCIUDAD_NAC_DATOS_PERSONALES','N');
      $this->addParam('pFECHA_NACIONALIDAD','pFECHA_NACIONALIDAD');
      $this->addParam('pCUIP','pCUIP','N');
      $this->addParam('pCIB',null,'');
      $this->addParam('pMotivoCIB',null,'');
      $this->addParam('pCURP_USR','pCURP_USR','N');
      

      $this->iniParam('pID_ALTERNA','numeric');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');

      $build = $this->build_query();
      $response = $this->query_multi($build);
      
      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
      }else{
        $resp = end($response);
        $this->response['status'] = $resp['tranEstatus'];
        $this->response['message'] = ($resp['tranEstatus'] == 1)? $resp['msg'] : $resp['txtError'];
        $this->response['data'] = array('pID_ALTERNA'=> (array_key_exists('pID_ALTERNA',$resp)? $resp['pID_ALTERNA'] : false) );
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }

    return $this->response;
  }

  #****************************************************************************************************************
  # NivelEstudios
  #**************************************************************************************************************** 
  # "Opcion Nueva Solicitud - Ficha Desarrollo Académico - Grid de datos Desarrollo Académico
  # sp_B1_getNivelEstudios - Obtiene los niveles de estudios de una persona"
  public function sp_B1_getNivelEstudios($idAlterna = null,$curp = null){

    $this->procedure('sp_B1_getNivelEstudios');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion Ver - Ficha Desarrollo Académico - Datos Desarrollo Académico
  # sp_B1_vwNivelEstudios - Muestra la informacion de los niveles de estudios de una persona
  public function sp_B1_vwNivelEstudios($idAlterna = null,$curp = null){

    $this->procedure('sp_B1_vwNivelEstudios');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  /*
  * Opcion Nueva Solicitud - Ficha Desarrollo Académico - Boton Guradar desarrollo academico
  * sp_B1_addNivelEstudios - Agraga un nivel de estudios a una persona
  */
  public function sp_B1_addNivelEstudios($model){

    $this->arrayToPost($model);    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('pID_ALTERNA', 'pID_ALTERNA', 'trim|required|numeric|max_length[10]');
    $this->form_validation->set_rules('pID_ESTADO_EMISOR', 'Máxima escolaridad', 'numeric|max_length[10]');
    $this->form_validation->set_rules('pID_EMISOR', 'Máxima escolaridad', 'numeric|max_length[10]');
    $this->form_validation->set_rules('pID_GRADO_ESCOLAR', 'Máxima escolaridad', 'trim|required|numeric|max_length[10]');
    $this->form_validation->set_rules('pESPECIALIDAD_DESARROLLO', 'Especialidad o estudio', 'trim|max_length[100]');
    $this->form_validation->set_rules('pNOMBRE_ESCUELA', 'Escuela', 'trim|max_length[100]');
    $this->form_validation->set_rules('pCEDULA_PROFESIONAL', 'Cédula profesional', 'trim|numeric|max_length[10]');
    $this->form_validation->set_rules('pINICIO_DESARROLLO', 'Fecha de inicio', 'trim');
    $this->form_validation->set_rules('pTERMINO_DESARROLLO', 'Fecha de término', 'trim');
    $this->form_validation->set_rules('pREGISTRO_SEP', 'Registro SEP', 'trim|max_length[1]');
    $this->form_validation->set_rules('pFOLIO_CERTIFICADO', 'Número de folio de certificado', 'trim|max_length[30]');
    $this->form_validation->set_rules('pPROMEDIO', 'Promedio', 'trim|numeric|max_length[10]');

    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B1_addNivelEstudios');

      $this->addParam('pID_ALTERNA','pID_ALTERNA');
      $this->addParam('pID_ESTADO_EMISOR',null); //Enviar vacio
      $this->addParam('pID_EMISOR',null); //Enviar vacio
      $this->addParam('pID_GRADO_ESCOLAR','pID_GRADO_ESCOLAR');
      $this->addParam('pESPECIALIDAD','pESPECIALIDAD_DESARROLLO','N');
      $this->addParam('pNOMBRE_ESCUELA','pNOMBRE_ESCUELA','N');
      $this->addParam('pCEDULA_PROFESIONAL','pCEDULA_PROFESIONAL');
      $this->addParam('pINICIO','pINICIO_DESARROLLO');
      $this->addParam('pTERMINO','pTERMINO_DESARROLLO');
      $this->addParam('pREGISTRO_SEP','pREGISTRO_SEP','N');
      $this->addParam('pFOLIO_CERTIFICADO','pFOLIO_CERTIFICADO','N');
      $this->addParam('pPROMEDIO','pPROMEDIO');

      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');
      $buid = $this->build_query();
      $query = $this->db->query($buid);
      $response = $this->query_row($query);

      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;

  }
  /**************************************************************************************************************** */
  # Domicilio
  /**************************************************************************************************************** */
  /*
  * "Opcion Nueva Solicitud - Ficha Domicilio - Grid de Domicilio
  * sp_B1_getDomicilio - Obtiene los domicilios de una persona"							      
  */
  public function sp_B1_getDomicilio($idAlterna = null,$curp = null){

    $this->procedure('sp_B1_getDomicilio');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion Ver - Ficha Domicilio - Datos del domicilio
  # sp_B1_vwDomicilio - Muesta los datos de domicilios de una persona
  public function sp_B1_vwDomicilio($idAlterna = null,$curp = null){

    $this->procedure('sp_B1_vwDomicilio ');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  
  /*
  *"Opcion Nueva Solicitud - Ficha Dimiclio - Boton Guardar Domicilio
  * sp_B1_addDomicilio - Agraga un domicilio a una persona "				
  */
  public function sp_B1_addDomicilio($model){

    $this->arrayToPost($model);
    $this->load->library('form_validation');
    $this->form_validation->set_rules('pID_ALTERNA', 'pID_ALTERNA', 'trim|required|numeric|max_length[10]');
    // $this->form_validation->set_rules('pID_ESTADO_EMISOR_Domicilio', 'hidden', 'numeric');//Enviar vacio
    // $this->form_validation->set_rules('pID_EMISOR_Domicilio', 'hidden', 'numeric');//Enviar vacio
    // $this->form_validation->set_rules('pID_TIPO_DOM', '', 'numeric');//Enviar vacio
    // $this->form_validation->set_rules('pID_PAIS', '', 'numeric');// Enviar vacio
    $this->form_validation->set_rules('pCALLE_DOMICILIO', 'Calle', 'trim|required|max_length[60]');
    $this->form_validation->set_rules('pCOLONIA_DOMICILIO', 'Colonia/Localidad', 'trim|required|max_length[60]');
    $this->form_validation->set_rules('pNUM_EXTERIOR_DOMICILIO', 'Número exterior', 'trim|required|max_length[30]');
    $this->form_validation->set_rules('pNUM_INTERIOR_DOMICILIO', 'Número interior', 'trim|max_length[30]');
    $this->form_validation->set_rules('pTELEFONO_DOMICILIO', 'Número telefónico', 'trim|required|max_length[20]');
    $this->form_validation->set_rules('pID_ENTIDAD_DOMICILIO', 'Estado', 'trim|required|numeric|max_length[10]');
    $this->form_validation->set_rules('pID_MUNICIPIO_DOMICILIO', 'Municipio', 'trim|required|numeric|max_length[10]');
    // $this->form_validation->set_rules('pENTRE_CALLE_DOMICILIO', 'Entre la calle de', 'trim|required|max_length[60]');
    $this->form_validation->set_rules('pY_CALLE_DOMICILIO', 'Y la calle de', 'trim|max_length[45]');
    $this->form_validation->set_rules('pCODIGO_POSTAL_DOMICILIO', 'Código postal', 'trim|required|max_length[10]');
    $this->form_validation->set_rules('pCIUDAD_DOMICILIO', 'Ciudad', 'trim|max_length[50]');

    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B1_addDomicilio');
      $this->addParam('pID_ALTERNA','pID_ALTERNA');
      $this->addParam('pID_ESTADO_EMISOR',null);//Enviar vacio
      $this->addParam('pID_EMISOR',null);//Enviar vacio
      $this->addParam('pID_TIPO_DOM',null); //Enviar vacio
      $this->addParam('pID_PAIS',null); // Enviar vacio
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
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;

  }

  #****************************************************************************************************************
  # Referencias
  #****************************************************************************************************************
  # "Opcion Nueva Solicitud - Ficha Referencias- Grid de Referencias
  # sp_B2_DG_getReferencias - Obtiene la informacion de las referencias de la persona "
  public function sp_B2_DG_getReferencias($idAlterna = null,$curp = null){

    $this->procedure('sp_B2_DG_getReferencias');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion Ver - Ficha Referencias - Datos de referencias
  # sp_B2_DG_vwReferencias - Muestra la informacion de las referencias de la persona
  public function sp_B2_DG_vwReferencias($idAlterna = null,$curp = null){

    $this->procedure('sp_B2_DG_vwReferencias');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  
  /*
  * @method sp_B2_DG_addReferencias - Agraga la informacion de las referencias de la persona		
  */
  public function sp_B2_DG_addReferencias($model){
    $this->arrayToPost($model);
    $this->load->library('form_validation');
    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR','pID_ESTADO_EMISOR_Referencias','',array('rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_EMISOR','pID_EMISOR_Referencias','',array('rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_TIPO_REFERENCIA','pID_TIPO_REFERENCIA','',array('name'=>'Tipo de referencia','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_OCUPACION','pID_OCUPACION','',array('name'=>'Ocupación','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pNOMBRE','pNOMBRE_REFERENCIAS','N',array('name'=>'Nombre','rule'=>'trim|required|max_length[30]'));
    $this->addParam('pPATERNO','pPATERNO_REFERENCIAS','N',array('name'=>'Apellido paterno','rule'=>'trim|required|max_length[30]'));
    $this->addParam('pMATERNO','pMATERNO_REFERENCIAS','N',array('name'=>'Apellido materno','rule'=>'trim|max_length[30]'));
    $this->addParam('pSEXO','pSEXO_REFERENCIAS','N',array('name'=>'Sexo','rule'=>'trim|required|max_length[1]'));
    $this->addParam('pID_RELACION',null,'',array('name'=>'','rule'=>'trim|numeric|max_length[10]'));//NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pID_TIPO_DOM','pID_TIPO_DOM','',array('name'=>'Tipo domicilio','rule'=>'trim|required|numeric|max_length[10]')); 
    $this->addParam('pID_PAIS',NULL); //NO LO ENCONTRE EN EL FORMULARIO
    $this->addParam('pCALLE','pCALLE_REFERENCIAS','N',array('name'=>'Calle','rule'=>'trim|max_length[60]'));
    $this->addParam('pCOLONIA','pCOLONIA_REFERENCIAS','N',array('name'=>'Colonia/localidad','rule'=>'trim|required|max_length[60]'));
    $this->addParam('pNUM_EXTERIOR','pNUM_EXTERIOR_REFERENCIAS','N',array('name'=>'Número exterior','rule'=>'trim|required|max_length[30]'));
    $this->addParam('pNUM_INTERIOR','pNUM_INTERIOR_REFERENCIAS','N',array('name'=>'Número interior','rule'=>'trim|max_length[30]'));
    $this->addParam('pTELEFONO','pTELEFONO_REFERENCIAS','N',array('name'=>'Número telefónico','rule'=>'trim|required|max_length[20]'));
    $this->addParam('pID_ENTIDAD','pID_ENTIDAD_REFERENCIAS','',array('name'=>'Entidad federativa','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_MUNICIPIO','pID_MUNICIPIO_REFERENCIAS','',array('name'=>'Municipio','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pENTRE_CALLE','pENTRE_CALLE_REFERENCIAS','N',array('name'=>'Entre calle de ','rule'=>'trim|max_length[60]'));
    $this->addParam('pY_CALLE','pY_CALLE_REFERENCIAS','N',array('name'=>'Y la calle de ','rule'=>'trim|max_length[45]'));
    $this->addParam('pCODIGO_POSTAL','pCODIGO_POSTAL_REFERENCIAS','N',array('name'=>'Código postal','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pCIUDAD','pCIUDAD_REFERENCIAS','N',array('name'=>'Ciudad','rule'=>'trim|max_length[50]'));
    
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_DG_addReferencias');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');

      $query = $this->db->query($this->build_query());
      $response = $this->query_row($query);

      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;

  }

  /**************************************************************************************************************** */
  # SocioEconomico
  /**************************************************************************************************************** */
  # "Opcion Nueva Solicitud - Ficha Socioeconomico- Obtener datos de socioeconomico
  # sp_B2_DG_getSocioEconomico - Obtiene el niviel socioeconomico de la persona"				
  public function sp_B2_DG_getSocioEconomico($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_DG_getSocioEconomico');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion Ver - Ficha Socieconomico - Datos socioeconomicos
  # sp_B2_DG_vwSocioEconomico - Muestra el niviel socioeconomico de la persona
  public function sp_B2_DG_vwSocioEconomico($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_DG_vwSocioEconomico');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $response = end($response);
        if($response['VIVE_FAMILIA'] == 'N'){
          $response['VIVE_FAMILIA'] = 'No';
        }else if($response['VIVE_FAMILIA'] == 'S'){
          $response['VIVE_FAMILIA'] = 'Si';
        }
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  /*
  * $this->addParam('method sp_B2_DG_addSocioEconomico - Agraga el niviel socioeconomico de la persona
  * NO SON HIGUALES LOS FORM
  */
  public function sp_B2_DG_addSocioEconomico($model){
    $this->arrayToPost($model);
    $this->load->library('form_validation');
    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR','pID_ESTADO_EMISOR_Socioeconomico','',array('rule'=>'trim|numeric'));
    $this->addParam('pID_EMISOR','pID_EMISOR_Socioeconomico','',array('rule'=>'trim|numeric'));

    $this->addParam('pVIVE_FAMILIA','pVIVE_FAMILIA','N',array('name'=>'¿Vive con su familia?','rule'=>'trim|max_length[1]'));
    $this->addParam('pINGRESO_FAMILIAR','pINGRESO_FAMILIAR','',array('name'=>'Ingreso familiar adicional (mensual)','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_TIPO_DOMIC','pID_TIPO_DOMICILIO','',array('name'=>'Su domicilio es','rule'=>'trim|numeric|max_length[30]'));
    $this->addParam('pACTIVIDAD_CULTURAL','pACTIVIDAD_CULTURAL','N',array('name'=>'Actividades culturales o deportivas que practica','rule'=>'trim|max_length[100]'));
    $this->addParam('pINMUEBLES','pINMUEBLES','N',array('name'=>'Especificación de inmuebles y costos','rule'=>'trim|max_length[100]'));
    $this->addParam('pINVERSIONES','pINVERSIONES','N',array('name'=>'Inversión y monto aproximado','rule'=>'trim|max_length[100]'));
    $this->addParam('pNUMERO_AUTOS','pNUMERO_AUTOS','N',array('name'=>'Vehículo y costo aproximado','rule'=>'trim|max_length[100]'));
    $this->addParam('pCALIDAD_VIDA','pCALIDAD_VIDA','N',array('name'=>'Calidad de vida','rule'=>'trim|max_length[50]'));
    $this->addParam('pVICIOS','pVICIOS','N',array('name'=>'Vicios','rule'=>'trim|max_length[100]'));
    $this->addParam('pIMAGEN_PUBLICA','pIMAGEN_PUBLICA','N',array('name'=>'Imágen pública','rule'=>'trim|max_length[50]'));
    $this->addParam('pCOMPORTA_SOCIAL','pCOMPORTA_SOCIAL','N',array('name'=>'Comportamiento social ','rule'=>'trim|max_length[40]'));
    // $this->addParam('pINGRESO_MENSUAL','pINGRESO_MENSUAL','N',array('name'=>'Ingreso mensual adicional','rule'=>'trim|max_length[30]'));
    $this->addParam('pRESPONSABLE_CORP',null); // no se encontro en el formulario
    
    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B2_DG_addSocioEconomico');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');

      $query = $this->db->query($this->build_query());
      $response = $this->query_row($query);

      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;

  }

  /**************************************************************************************************************** */
  # Dependiente
  /**************************************************************************************************************** */
  # "Opcion Nueva Solicitud - Ficha Socioeconomico- Grid dependientes
  # sp_B2_DG_getDependientes - Obtiene los datos de las personas dependientes del elemento "				
  public function sp_B2_DG_getDependientes($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_DG_getDependientes');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion Ver - Ficha Socieconomico - Datos dependiente
  # sp_B2_DG_vwDependientes - Muestra los datos de las personas dependientes del elemento 
  public function sp_B2_DG_vwDependientes($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_DG_vwDependientes');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  
  # @method sp_B2_DG_addDependiente - Agrega los datos de las personas dependientes del elemento				
  public function sp_B2_DG_addDependiente($model){
    $this->arrayToPost($model);
    $this->load->library('form_validation');
    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR','pID_ESTADO_EMISOR_Socioeconomico','',array('rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_EMISOR','pID_EMISOR_Socioeconomico','',array('rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pPATERNO','pPATERNO_SOCIOECONOMICOS','',array('name'=>'Apellido paterno','rule'=>'trim|required|max_length[40]'));
    $this->addParam('pMATERNO','pMATERNO_SOCIOECONOMICOS','',array('name'=>'Apellido materno','rule'=>'trim|max_length[40]'));
    $this->addParam('pFECHA_NAC','pFECHA_NAC_SOCIOECONOMICOS','',array('name'=>'Fecha de nacimiento','rule'=>'trim|required|max_length[10]'));
    $this->addParam('pSEXO','pSEXO_SOCIOECONOMICOS','',array('name'=>'Sexo','rule'=>'trim|required|max_length[1]'));
    $this->addParam('pNOMBRE','pNOMBRE_SOCIOECONOMICOS','',array('name'=>'Nombre','rule'=>'trim|required|max_length[40]'));
    $this->addParam('pID_SUBTIPO_REF','pID_RELACION_SOCIOECONOMICOS','',array('name'=>'Parentesco','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_TIPO_DEPENDIENT','pID_RELACION','',array('name'=>'Relación ','rule'=>'trim|required|numeric|max_length[10]'));
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_DG_addDependiente');
      $this->iniParam('txtError','varchar','500');
      $this->iniParam('msg','varchar','500');
      $this->iniParam('tranEstatus','int');
      $query = $this->db->query($this->build_query());
      $response = $this->query_row($query);

      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        #PARCHE EL PROCEDIMIENTO ESTA REGRESANDO EL MENSAGE DE ERROR POR MSG NO POR TXTERROR
        $msg = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
        $this->response['message'] = (strlen(trim($msg))>0)? $msg : $response['msg'];
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }



  /**************************************************************************************************************** */
  # Adscripcion
  /**************************************************************************************************************** */
  public function sp_B1_getAdscripcion($idAlterna = null,$curp = null){
    $this->procedure('sp_B1_getAdscripcion');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  public function sp_B1_vwAdscripcion($idAlterna = null,$curp = null){
    $this->procedure('sp_B1_vwAdscripcion');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  /*
  * "Opcion Nueva Solicitud - Ficha Laboral - Pestaña Adscripción Actual
  * Boton Guardar Adscipcion.
  * sp_B1_addAdscripcion - Agraga la adscripcion de la persona"
  */
  public function sp_B1_addAdscripcion($model){
    $this->arrayToPost($model);
    $this->load->library('form_validation');
    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR','pID_ESTADO_EMISOR_Adscripcion_actual','',array('rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_EMISOR','pID_EMISOR_Adscripcion_actual','',array('rule'=>'trim|numeric|max_length[10]'));
    
    $this->addParam('pID_ENTIDAD','pID_ENTIDAD_ADSCRIPCION_ACTUAL','',array('name'=>'Estado','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_MUNICIPIO','pID_MUNICIPIO_ADSCRIPCION_ACTUAL','',array('name'=>'Municipio','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_AREA','pID_AREA','',array('name'=>'Área o departamento','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_PUESTO','pPUESTO_ADSCRIPCION_ACTUAL','',array('name'=>'Puesto','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_DEPENDENCIA','pID_DEPENDENCIA_ADSCRIPCION_ACTUAL','',array('name'=>'Dependencia','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_INSTITUCION','pID_INSTITUCION','',array('name'=>'','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_TIPO_CONTRATO','pID_TIPO_CONTRATO_Adscripcion_actual','',array('name'=>'','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pFECHA_INGRESO','pFECHA_INGRESO','',array('name'=>'Fecha de ingreso','rule'=>'trim|required|max_length[10]'));
    $this->addParam('pESPECIALIDAD','pESPECIALIDAD','N',array('name'=>'Especialidad','rule'=>'trim|max_length[50]'));
    $this->addParam('pRANGO','pRANGO','N',array('name'=>'Rango o categoría','rule'=>'trim|max_length[30]'));
    $this->addParam('pSUELDO_BASE','pSUELDO_BASE','',array('name'=>'Sueldo base (Mensual)','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_NIVEL_MANDO','pID_NIVEL_MANDO','',array('name'=>'Nivel de mando','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pCOMPENSACION','pCOMPENSACION','',array('name'=>'Compensaciones (Mensuales)','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pNUMERO_PLACA','pNUMERO_PLACA','N',array('name'=>'Número de placa','rule'=>'trim|max_length[20]'));
    $this->addParam('pNUMERO_EXPEDIENTE','pNUMERO_EXPEDIENTE','N',array('name'=>'Número de expediente','rule'=>'trim|max_length[20]'));
    $this->addParam('pFUNCIONES','pFUNCIONES','N',array('name'=>'Funciones','rule'=>'trim|max_length[100]'));
    $this->addParam('pNUMERO_EMPLEADO',null,'N',array('name'=>'','rule'=>'trim|max_length[10]'));//no lo encontre
    $this->addParam('pID_CATEGORIA_PUEST','pID_CATEGORIA_PUEST_Adscripcion_actual','',array('rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_JERARQUIA_PUEST','pID_JERARQUIA_PUEST_Adscripcion_actual','',array('rule'=>'trim|numeric|max_length[10]'));//no lo encontre
    $this->addParam('pID_FUNCION_PUESTO',null,'',array('name'=>'','rule'=>'trim|numeric|max_length[10]'));//no lo encontre
    $this->addParam('pID_AMBITO_PUESTO','pID_AMBITO_PUESTO_Adscripcion_actual','',array('rule'=>'trim|numeric|max_length[10]'));//no lo encontre
    $this->addParam('pDIVISION','pDIVISION','N',array('name'=>'','rule'=>'trim|max_length[30]'));
    $this->addParam('pID_JEFE','ID_JEFE','',array('rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pID_MOTIVO_MOV_LAB',null);//no lo encontre
    $this->addParam('pID_TIPO_BAJA',null);//no lo encontre
    $this->addParam('pFECHA_BAJA',null);//no lo encontre
    $this->addParam('pOBSERVACION_BAJA',null);//no lo encontre
    $this->addParam('pCODIGO_POSTAL','pCP_EMP_ADSCRIPCION_ACTUAL','N',array('name'=>'Código postal','rule'=>'trim|max_length[10]'));
    $this->addParam('pCIUDAD','pCIUDAD','N',array('name'=>'Ciudad','rule'=>'trim|max_length[50]'));
    $this->addParam('pCOLONIA','Colonia/Localidad','N',array('name'=>'Ciudad','rule'=>'trim|max_length[60]'));
    $this->addParam('pCALLE','Calle','N',array('name'=>'Calle','rule'=>'trim|max_length[60]'));
    $this->addParam('pNUM_EXTERIOR','pNUM_EXTERIOR','N',array('name'=>'Número exterior','rule'=>'trim|max_length[30]'));
    $this->addParam('pNUM_INTERIOR','pNUM_INTERIOR','N',array('name'=>'Número interior','rule'=>'trim|max_length[30]'));
    $this->addParam('pTELEFONO','pTELEFONO','N',array('name'=>'Número telefónico','rule'=>'trim|max_length[20]'));
    
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B1_addAdscripcion');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');
      $build = $this->build_query();
      $query = $this->db->query($build);
      $response = $this->query_row($query);
      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;

  }

  # ****************************************************************************************************************
  # Empleos diversos
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Laboral - Pestaña Empleos DIversos
  # Boton Guardar Empleo.
  # sp_B2_LAB_addEmpleoAdicional - Agrega la información de los empleos del elemento en general
  public function  sp_B2_LAB_addEmpleoAdicional($model){
    $this->arrayToPost($model);
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR',null);
    $this->addParam('pID_EMISOR',null);

    $this->addParam('pFECHA_INICIO','pFECHA_INICIO_EMPLEOS_DIVERSOS','',array('name'=>'Fecha de ingreso','rule'=>'trim|required|max_length[10]'));
    $this->addParam('pFECHA_TERMINO','pFECHA_TERMINO_EMPLEOS_DIVERSOS','',array('name'=>'Fecha de separación','rule'=>'trim|required|max_length[10]'));
    $this->addParam('pID_ENTIDAD','pID_ENTIDAD_EMPLEOS_DIVERSOS','',array('name'=>'Estado','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_MUNICIPIO','pID_MUNICIPIO_EMPLEOS_DIVERSOS','',array('name'=>'Municipio','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pEMPRESA','pEMPRESA','N',array('name'=>'Empresa','rule'=>'trim|required|max_length[100]'));
    $this->addParam('pDESCRIP_FUNCION','pDESCRIP_FUNCION','N',array('name'=>'Funciones','rule'=>'trim|max_length[100]'));
    $this->addParam('pDESCRIP_AREA','pDESCRIP_AREA','N',array('name'=>'Área o departamento','rule'=>'trim|max_length[50]'));
    $this->addParam('pCALLE_Y_NUM_EMP','pCALLE_Y_NUM_EMPLEOS_DIVERSOS','N',array('name'=>'Calle y número','rule'=>'trim|max_length[60]'));
    $this->addParam('pCOLONIA_EMP','pCOLONIA_EMPLEOS_DIVERSOS','',array('name'=>'Colonia/Localidad','rule'=>'trim|required|max_length[60]'));
    $this->addParam('pCP_EMP','pCP_EMP_EMPLEOS_DIVERSOS','N',array('name'=>'Código postal','rule'=>'trim|required|numeric|max_length[5]'));
    $this->addParam('pNUM_TELEFONICO','pNUM_TELEFONICO','N',array('name'=>'Número telefónico','rule'=>'trim|max_length[20]'));
    $this->addParam('pID_MOTIVO_MOV_LAB','ID_MOTIVO_MOV_LAB','',array('name'=>'Motivo de separación','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_TIPO_MOV_LAB','pID_TIPO_MOV_LAB','',array('name'=>'Tipo de separación','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pSUELDO','pSUELDO_EMPLEOS_DIVERSOS','',array('name'=>'Ingreso neto (mensual)','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pDESCRIPCION','pDESCRIPCION','N',array('name'=>'Descripción','rule'=>'trim|max_length[150]'));
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_LAB_addEmpleoAdicional');
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
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud - Ficha Laboral - Pestaña Empleos DIversos
  # Grid -  Empleos.
  # sp_B2_LAB_getEmpleoAdicional - Obtiene la información de los empleos del elemento en general
  public function sp_B2_LAB_getEmpleoAdicional($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_LAB_getEmpleoAdicional');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  public function sp_B2_LAB_vwEmpleoAdicional($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_LAB_vwEmpleoAdicional');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # ****************************************************************************************************************
  # Actitudes hacia el empleo
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Laboral - Pestaña Actitutes hacia el empleo
  # Boton Guardar Actitud.
  # sp_B2_LAB_addActitud - Agrega la información de las actitudes hacia el empleo por parte del elemento.
  public function  sp_B2_LAB_addActitud($model){

    $this->arrayToPost($model);
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR',null);
    $this->addParam('pID_EMISOR',null);

    $this->addParam('pELECCION_EMPLEO','pELECCION_EMPLEO','N',array('name'=>'¿Por qué eligió éste empleo?','rule'=>'trim|max_length[250]'));
    $this->addParam('pRAZON_NO_RECON','pRAZON_NO_RECON','N',array('name'=>'¿Razones por las que no ha obtenido un reconocimiento?','rule'=>'trim|max_length[150]'));
    $this->addParam('pPUESTO','pPUESTO_ACTITUDES_EMPLEO','N',array('name'=>'¿Qué puesto desearía tener?','rule'=>'trim|max_length[150]'));
    $this->addParam('pCONOCE_REG_RECON','pCONOCE_REG_RECON','N',array('name'=>'¿Conoce el reglamento de los reconocimientos?','rule'=>'trim|max_length[1]'));
    $this->addParam('pTIEMPO_ASCENDER','pTIEMPO_ASCENDER','N',array('name'=>'¿En qué tiempo desea ascender?','rule'=>'trim|max_length[20]'));
    $this->addParam('pAREA','pAREA','N',array('name'=>'¿En qué Área o departamento desearía estar?','rule'=>'trim|max_length[150]'));
    $this->addParam('pCAPACITACION','pCAPACITACION','N',array('name'=>'¿Qué capacitación le gustaría recibir?','rule'=>'trim|max_length[100]'));
    $this->addParam('pCONOCE_REG_ASCENSO','pCONOCE_REG_ASCENSO','N',array('name'=>'¿Conoce la reglamentación de los ascensos?','rule'=>'trim|max_length[1]'));
    $this->addParam('pRAZON_NO_ASCENSO','pRAZON_NO_ASCENSO','N',array('name'=>'¿Razones por las que no ha obtenido un ascenso?','rule'=>'trim|max_length[150]'));//ERROR CAMPO REPETIDO
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_LAB_addActitud');
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
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  public function sp_B2_LAB_getActitud($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_LAB_getActitud');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion VER - Ficha Laboral - Pestaña Actitudes para el empleo
  # sp_B2_LAB_vwActitud - Muestra la información de la ultima actitude hacia el empleo por parte del elemento.
  public function sp_B2_LAB_vwActitud($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_LAB_vwActitud');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        if($response['CONOCE_REG_RECON'] == 'N'){
          $response['CONOCE_REG_RECON'] = 'No';
        }else if($response['CONOCE_REG_RECON'] == 'S'){
          $response['CONOCE_REG_RECON'] = 'Si';
        }
        if($response['CONOCE_REG_ASCENSO'] == 'N'){
          $response['CONOCE_REG_ASCENSO'] = 'No';
        }else if($response['CONOCE_REG_ASCENSO'] == 'S'){
          $response['CONOCE_REG_ASCENSO'] = 'Si';
        }
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  
  # ****************************************************************************************************************
  # Comisiones
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Laboral - Pestaña Comisiones
  # Boton Guardar Comision.
  # sp_B2_LAB_addComision - Agrega la información referente a comisiones asociadas al elemento.
  public function  sp_B2_LAB_addComision($model){

    $this->arrayToPost($model);
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR',null);
    $this->addParam('pID_EMISOR',null);

    $this->addParam('pID_TIPO_COMISION','ID_TIPO_COMISION','',array('name'=>'Tipo de comisión','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_MOTIVO','pID_MOTIVO','',array('name'=>'Motivo','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pFECHA_INICIO','pFECHA_INICIO_COMISIONES','',array('name'=>'Fecha de inicio','rule'=>'trim|required|max_length[10]'));
    $this->addParam('pFECHA_TERMINO','pFECHA_TERMINO_COMISIONES','',array('name'=>'Fecha de término','rule'=>'trim|required|max_length[10]'));
    $this->addParam('pDESTINO','pDESTINO','N',array('name'=>'Destino','rule'=>'trim|required|max_length[250]'));
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_LAB_addComision');
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
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud - Ficha Laboral - Pestaña Comisiones
  # Grid - Comisiones.
  # sp_B2_LAB_getComision - Obtiene la información referente a comisiones asociadas al elemento.
  public function sp_B2_LAB_getComision($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_LAB_getComision');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  public function sp_B2_LAB_vwComision($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_LAB_vwComision');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # ****************************************************************************************************************
  # Idiomas y/o dialectos
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Capacitacion - Pestaña Idiomay/o dialecto
  # Boton Guardar Idioma y/o dialecto.
  # sp_B2_CAPS_addIdiomaHablado - Agrega la información de idiomas que habla el elemento.
  public function  sp_B2_CAPS_addIdiomaHablado($model){

    $this->arrayToPost($model);
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR',null);
    $this->addParam('pID_EMISOR',null);

    $this->addParam('pID_IDIOMA','pID_IDIOMA','',array('name'=>'Idioma y/o dialecto ','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pGRADO_LECTURA','pGRADO_LECTURA','',array('name'=>'Lectura','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pGRADO_ESCRITURA','pGRADO_ESCRITURA','',array('name'=>'Escritura','rule'=>'trim|numeric|max_length[10]'));
    $this->addParam('pGRADO_CONVERSACION','pGRADO_CONVERSACION','',array('name'=>'Conversación','rule'=>'trim|numeric|max_length[10]'));
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_CAPS_addIdiomaHablado');
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
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud - Ficha Capacitacion - Pestaña Idiomay/o dialecto
  # Grid - Idioma y/o dialecto.
  # sp_B2_CAPS_getIdiomaHablado - Obtiene la información de idiomas que habla el elemento.
  public function sp_B2_CAPS_getIdiomaHablado($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_CAPS_getIdiomaHablado');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion VER - Ficha Capacitacion - Pestaña Idiomay/o dialecto
  # sp_B2_CAPS_vwIdiomaHablado - Muestra la información del ultimo idioma que habla el elemento.
  public function sp_B2_CAPS_vwIdiomaHablado($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_CAPS_vwIdiomaHablado');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # ****************************************************************************************************************
  # Habilidades y/o actitudes
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Capacitacion - Pestaña Habilidad y/o actitud
  # Boton Guardar habilidad y/o actitud.
  # sp_B2_CAPS_addHabilidadAptitud - Agrega los datos sobre habilidades y aptitudes del elemento.
  public function  sp_B2_CAPS_addHabilidadAptitud($model){
    $this->arrayToPost($model);
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR',null);
    $this->addParam('pID_EMISOR',null);

    $this->addParam('pID_TIPO_APTITUD','pID_TIPO_APTITUD','',array('name'=>'Tipo de habilidad y/o aptitud','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pESPECIFIQUE','pESPECIFIQUE','N',array('name'=>'Descripción','rule'=>'trim|max_length[100]'));
    $this->addParam('pID_GRADO_APT_HAB','pID_GRADO_APT_HAB','',array('name'=>'Grado de aptitud o dominio','rule'=>'trim|required|numeric|max_length[10]'));
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_CAPS_addHabilidadAptitud');
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
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud - Ficha Capacitacion - Pestaña Habilidad y/o actitud
  # Grid - habilidad y/o actitud.
  # sp_B2_CAPS_getHabilidadAptitud - Obtiene los datos sobre habilidades y aptitudes del elemento.
  public function sp_B2_CAPS_getHabilidadAptitud($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_CAPS_getHabilidadAptitud');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion VER - Ficha Capacitacion - Pestaña Habilidad y/o actitud
  # sp_B2_CAPS_vwHabilidadAptitud - Muestra los datos sobre la ultima habilidad y/o aptitud del elemento.
  public function sp_B2_CAPS_vwHabilidadAptitud($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_CAPS_vwHabilidadAptitud');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # ****************************************************************************************************************
  # Media filiación
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Media Filiacion
  # Boton Guardar Media filiacion.
  # sp_B2_MF_addFiliacion - Agrega la información de la media filiación del elemento.
  public function  sp_B2_MF_addFiliacion($model){

    $this->arrayToPost($model);
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR',null);
    $this->addParam('pID_EMISOR',null);

    $this->addParam('pCOMPLEXION','pCOMPLEXION','',array('name'=>'Complexión','rule'=>'trim|max_length[10]'));
    $this->addParam('pCOLOR_PIEL','pCOLOR_PIEL','',array('name'=>'Color de piel','rule'=>'trim|max_length[10]'));
    $this->addParam('pCARA','pCARA','',array('name'=>'Cara','rule'=>'trim|max_length[10]'));//DIFERENTE
    $this->addParam('pCABELLO_CANTIDAD','pCABELLO_CANTIDAD','',array('name'=>'Cantidad','rule'=>'trim|max_length[10]'));
    $this->addParam('pCABELLO_COLOR','pCABELLO_COLOR','',array('name'=>'Color','rule'=>'trim|max_length[10]'));
    $this->addParam('pCABELLO_FORMA','pCABELLO_FORMA','',array('name'=>'Forma','rule'=>'trim|max_length[10]'));
    $this->addParam('pCABELLO_CALVICIE','pCABELLO_CALVICIE','',array('name'=>'Calvicie','rule'=>'trim|max_length[10]'));
    $this->addParam('pCABELLO_IMPLANTAC','pCABELLO_IMPLANTAC','',array('name'=>'Implantación','rule'=>'trim|max_length[10]'));
    $this->addParam('pFRENTE_ALTURA','pFRENTE_ALTURA','',array('name'=>'Altura','rule'=>'trim|max_length[10]'));
    $this->addParam('pFRENTE_INCLINACION','pFRENTE_INCLINACION','',array('name'=>'Inclinación','rule'=>'trim|max_length[10]'));
    $this->addParam('pFRENTE_ANCHO','pFRENTE_ANCHO','',array('name'=>'Ancho','rule'=>'trim|max_length[10]'));
    $this->addParam('pCEJAS_DIRECCION','pCEJAS_DIRECCION','',array('name'=>'Dirección','rule'=>'trim|max_length[10]'));
    $this->addParam('pCEJAS_IMPLANTAC','pCEJAS_IMPLANTAC','',array('name'=>'Implantación','rule'=>'trim|max_length[10]'));
    $this->addParam('pCEJAS_FORMA','pCEJAS_FORMA','',array('name'=>'Forma','rule'=>'trim|max_length[10]'));
    $this->addParam('pCEJAS_TAMANO','pCEJAS_TAMANO','',array('name'=>'Tamaño','rule'=>'trim|max_length[10]'));
    $this->addParam('pOJOS_COLOR','pOJOS_COLOR','',array('name'=>'Color','rule'=>'trim|max_length[10]'));
    $this->addParam('pOJOS_FORMA','pOJOS_FORMA','',array('name'=>'Forma','rule'=>'trim|max_length[10]'));
    $this->addParam('pOJOS_TAMANO','pOJOS_TAMANO','',array('name'=>'Tamaño','rule'=>'trim|max_length[10]'));
    $this->addParam('pNARIZ_RAIZ','pNARIZ_RAIZ','',array('name'=>'Raíz','rule'=>'trim|max_length[10]'));//DIFERENTE
    $this->addParam('pNARIZ_DORSO','pNARIZ_DORSO','',array('name'=>'Dorso','rule'=>'trim|max_length[10]'));
    $this->addParam('pNARIZ_ANCHO','pNARIZ_ANCHO','',array('name'=>'Ancho','rule'=>'trim|max_length[10]'));
    $this->addParam('pNARIZ_BASE','pNARIZ_BASE','',array('name'=>'Base','rule'=>'trim|max_length[10]'));
    $this->addParam('pNARIZ_ALTURA','pNARIZ_ALTURA','',array('name'=>'Altura','rule'=>'trim|max_length[10]'));
    $this->addParam('pBOCA_TAMANO','pBOCA_TAMANO','',array('name'=>'Tamaño','rule'=>'trim|max_length[10]'));
    $this->addParam('pBOCA_COMISURAS','pBOCA_COMISURAS','',array('name'=>'Comisuras','rule'=>'trim|max_length[10]'));
    $this->addParam('pLABIOS_ESPESOR','pLABIOS_ESPESOR','',array('name'=>'Espesor','rule'=>'trim|max_length[10]'));
    $this->addParam('pLABIOS_ALTURA','pLABIOS_ALTURA','',array('name'=>'Altura naso-labial','rule'=>'trim|max_length[10]'));
    $this->addParam('pLABIOS_PROMINENCIA','pLABIOS_PROMINENCIA','',array('name'=>'Prominencia','rule'=>'trim|max_length[10]'));
    $this->addParam('pMENTON_TIPO','pMENTON_TIPO','',array('name'=>'Tipo','rule'=>'trim|max_length[10]'));
    $this->addParam('pMENTON_FORMA','pMENTON_FORMA','',array('name'=>'Froma','rule'=>'trim|max_length[10]'));
    $this->addParam('pMENTON_INCLINACION','pMENTON_INCLINACION','',array('name'=>'Inclinación','rule'=>'trim|max_length[10]'));
    $this->addParam('pOREJA_FORMA','pOREJA_FORMA','',array('name'=>'Forma','rule'=>'trim|max_length[10]'));
    $this->addParam('pOREJA_ORIGINAL','pOREJA_ORIGINAL','',array('name'=>'Original','rule'=>'trim|max_length[10]'));
    $this->addParam('pOREJA_HEL_SUP','pOREJA_HEL_SUP','',array('name'=>'Superior','rule'=>'trim|max_length[10]'));
    $this->addParam('pOREJA_HEL_POST','pOREJA_HEL_POST','',array('name'=>'Posterior','rule'=>'trim|max_length[10]'));
    $this->addParam('pOREJA_HEL_ADHEREN','pOREJA_HEL_ADHEREN','',array('name'=>'Adherencia','rule'=>'trim|max_length[10]'));
    $this->addParam('pOREJA_HEL_CONTORNO','pOREJA_HEL_CONTORNO','',array('name'=>'Contorno','rule'=>'trim|max_length[10]'));
    $this->addParam('pOREJA_LOB_ADHEREN','pOREJA_LOB_ADHEREN','',array('name'=>'Adherencia','rule'=>'trim|max_length[10]'));
    $this->addParam('pOREJA_LOB_PARTIC','pOREJA_LOB_PARTIC','',array('name'=>'Particularidad','rule'=>'trim|max_length[10]'));
    $this->addParam('pOREJA_LOB_DIMEN','pOREJA_LOB_DIMEN','',array('name'=>'Dimensión','rule'=>'trim|max_length[10]'));
    $this->addParam('pSANGRE','pSANGRE','',array('name'=>'Tipo','rule'=>'trim|max_length[10]'));
    $this->addParam('pFACTOR_RH','pFACTOR_RH','',array('name'=>'Factor RH','rule'=>'trim|max_length[10]'));//NO SE VE EL COMBO
    $this->addParam('pLENTES','pLENTES','N',array('name'=>'¿Usa anteojos?','rule'=>'trim|required|max_length[10]'));
    $this->addParam('pESTATURA','pESTATURA','',array('name'=>'Estatura (cm)','rule'=>'trim|required|max_length[10]'));//ESTA DIFERENTE
    $this->addParam('pPESO','pPESO','',array('name'=>'Peso (kg)','rule'=>'trim|required|max_length[10]'));//p_PESO

    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_MF_addFiliacion');
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
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Media Filiacion
  # sp_B2_MF_getFiliacion - Obtiene la información de la media filiación del elemento.
  public function sp_B2_MF_getFiliacion($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_getFiliacion');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion VER - Ficha Identificación- Pestaña Media Filiacion
  # sp_B2_MF_vwFiliacion - Muestra la información de la media filiación del elemento.
  public function sp_B2_MF_vwFiliacion($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_vwFiliacion');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  
  # ****************************************************************************************************************
  # Señas particulares
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Señas particulares
  # Boton Guardar Seña.
  # sp_B2_MF_addSenasParticulares - Agrega las señas particulares correspondientes al elemento policial.
  public function  sp_B2_MF_addSenasParticulares($model){

    $this->arrayToPost($model);
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR',null);
    $this->addParam('pID_EMISOR',null);

    $this->addParam('pID_TIPO_SENAS','pID_TIPO_SENAS','',array('name'=>'Tipo de seña','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pLADO','pLADO','N',array('name'=>'Lado','rule'=>'trim|required|max_length[1]'));
    $this->addParam('pID_REGION','pID_REGION','',array('name'=>'Cara','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pVISTA','pVISTA','N',array('name'=>'Vista','rule'=>'trim|required|max_length[1]'));
    $this->addParam('pCANTIDAD','pCANTIDAD','',array('name'=>'Cantidad','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pDESCRIPCION','pDESCRIPCION','N',array('name'=>'Descripción','rule'=>'trim|max_length[30]'));
    
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_MF_addSenasParticulares');
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
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  # Opcion VER - Ficha Identificación- Pestaña Señas Particulares
  # sp_B2_MF_vwSenasParticulares - Muestra la ultima seña particular correspondientes al elemento policial.
  public function sp_B2_MF_vwSenasParticulares($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_vwSenasParticulares');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Señas Particulares
  # Grid - Seña Particulares
  # sp_B2_MF_getSenasParticulares - Obtiene las señas particulares correspondientes al elemento policial.
  public function sp_B2_MF_getSenasParticulares($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_getSenasParticulares');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }
  

  # ****************************************************************************************************************
  # Ficha fotográfica
  # ****************************************************************************************************************
  
  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Ficha Fotográfica
  # Mostrar Datos Iniciales de la Pantalla
  # sp_B2_MF_opcFichaFotografica - Muestra los datos de la pestaña de ficha fotografica
  public function sp_B2_MF_opcFichaFotografica($idAlterna = null){
    $this->procedure('sp_B2_MF_opcFichaFotografica');
    $this->addParam('pID_ALTERNA',$idAlterna);
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion VER - Ficha Identificación- Pestaña Ficha Fotográfica
  # sp_B2_MF_vwFichaFotografica - Muestra los datos la ficha fotográfica 
  public function sp_B2_MF_vwFichaFotografica($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_vwFichaFotografica');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $response['IMG_PERFILIZQ'] = (Utils::isJSON($response['IMG_PERFILIZQ']))? utils::addPath(STATIC_DOCUMMENTS_PATH.'fichaFotografica/',$response['IMG_PERFILIZQ']) : null;
        $response['IMG_FRENTE'] = (Utils::isJSON($response['IMG_FRENTE']))? utils::addPath(STATIC_DOCUMMENTS_PATH.'fichaFotografica/',$response['IMG_FRENTE']) : null;
        $response['IMG_PERFILDR'] = (Utils::isJSON($response['IMG_PERFILDR']))? utils::addPath(STATIC_DOCUMMENTS_PATH.'fichaFotografica/',$response['IMG_PERFILDR']) : null;
        $response['IMG_FIRMA'] = (Utils::isJSON($response['IMG_FIRMA']))? utils::addPath(STATIC_DOCUMMENTS_PATH.'fichaFotografica/',$response['IMG_FIRMA']) : null;
        $response['IMG_HUELLA'] = (Utils::isJSON($response['IMG_HUELLA']))? utils::addPath(STATIC_DOCUMMENTS_PATH.'fichaFotografica/',$response['IMG_HUELLA']) : null;
        
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Ficha Identificación- Pestaña Ficha Fotográfica
  # Grid - Ficha Fotográfica
  # sp_B2_MF_getFichaFotografica - Muestra los datos requeridos en el grid
  public function sp_B2_MF_getFichaFotografica($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_getFichaFotografica');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Ficha Fotográfica
  # Boton Guardar Ficha
  # sp_B2_MF_addFichaFotografica - Agrega la ficha fotográfica del elemento (fotos, huella, firma).
  public function  sp_B2_MF_addFichaFotografica($idAlterna,$tipoImagen,$path){
    $this->arrayToPost(array('pID_ALTERNA'=>$idAlterna,'pTIPO_IMAGEN'=>$tipoImagen,'pPATH_IMAGEN'=>$path));
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pTIPO_IMAGEN','pTIPO_IMAGEN','',array('rule'=>'trim|required|max_length[5]'));
    $this->addParam('pPATH_IMAGEN','pPATH_IMAGEN','',array('rule'=>'trim|required|max_length[250]'));

    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_MF_addFichaFotografica');
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
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }
  
  # ****************************************************************************************************************
  # Registro decadactilar
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Registro decadactilar
  # Boton Guardar Regsitro
  # sp_B2_MF_addReg_decadactilar - Agrega el documento con las huellas dactilares, palmares y canto de ambas manos.
  public function  sp_B2_MF_addReg_decadactilar($idAlterna,$path){
    $this->arrayToPost(array('pID_ALTERNA'=>$idAlterna,'pPATH_IMAGEN'=>$path));
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pPATH_IMAGEN','pPATH_IMAGEN','',array('rule'=>'trim|required|max_length[250]'));

    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_MF_addReg_decadactilar');
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
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Registro decadactilar
  # Grid - Registro decadactilar
  # sp_B2_MF_getReg_decadactilar - Obtiene los documentos registrados con las huellas dactilares, palmares y canto de ambas manos.
  public function sp_B2_MF_getReg_decadactilar($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_getReg_decadactilar');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # pcion VER - Ficha Identificación- Pestaña Registro decadactilar
  # sp_B2_MF_vwReg_decadactilar - Muestra el documento con las huellas dactilares, palmares y canto de ambas manos.
  public function sp_B2_MF_vwReg_decadactilar($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_vwReg_decadactilar');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $response['IMG_DOCUMENTO'] = (Utils::isJSON($response['IMG_DOCUMENTO']))?  utils::addPath(STATIC_DOCUMMENTS_PATH.'fichaDecadactilar/',$response['IMG_DOCUMENTO']) : null;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  private function mssql_escape($data) {
      if(is_numeric($data))
          return $data;
      $unpacked = unpack('H*hex', $data);
      return '0x' . $unpacked['hex'];
  }

  # ****************************************************************************************************************
  # Digitalización de documento
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Digitalización de documento
  # Boton Guardar Documento
  # sp_B2_MF_addDocumento - Agrega las imágenes de los documentos pertenecientes al elemento.
  public function  sp_B2_MF_addDocumento($file,$binaryFile){    
    
    $this->load->helper('imagesInDB');
    $this->load->library('form_validation');

    $this->arrayToPost(
      array(
        'pPATH_IMAGEN'=> $file,
        'pIMAGEN'=> prepareImageDBString($binaryFile)
      )
    );

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pID_ESTADO_EMISOR',null);
    $this->addParam('pID_EMISOR',null);
    $this->addParam('pID_CATEGORIA_DOC','pID_CATEGORIA_DOC','',array('name'=>'Categoría de documento','rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pVALOR',null);
    $this->addParam('pFECHA_DOCUMENTO','FECHA_DOCUMENTO','',array('name'=>'Fecha documento','rule'=>'trim|max_length[10]'));
    $this->addParam('pESTATUS',null);
    $this->addParam('pPATH_IMAGEN','pPATH_IMAGEN','',array('name'=>'Documento','rule'=>'trim|required|max_length[250]'));
    $this->addParam('pIMAGEN','pIMAGEN','N');



    if ($this->form_validation->run() === true) {

      $this->procedure('sp_B2_MF_addDocumento');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');
      $build = $this->build_query();
      $query = $this->db->query($build);
      $response = $this->query_row($query);
      if($response == FALSE){        
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Digitalización de documento
  # Grid - Registro de Documento
  # sp_B2_MF_getDocumento - Obtiene las imágenes de los documentos pertenecientes al elemento.
  public function sp_B2_MF_getDocumento($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_getDocumento');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        foreach ($response as $key => $value) {
          $response[$key]['VALOR'] = (Utils::isJSON($response[$key]['VALOR']))? utils::addPath(STATIC_DOCUMMENTS_PATH .'fichaDocumento/',$response[$key]['VALOR']) : null;
        }
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # Opcion VER - Ficha Identificación- Pestaña Digitalización de documento
  # sp_B2_MF_vwDocumento - Muestra las imágenes de los documentos pertenecientes al elemento.
  public function sp_B2_MF_vwDocumento($idAlterna = null,$curp = null){
    $this->procedure('sp_B2_MF_vwDocumento');
    $this->addParam('pCURP',$curp,'N');
    $this->addParam('pID_ALTERNA',$idAlterna);
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_row($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $response['NOMBRE_DOCUMENTO'] = (Utils::isJSON($response['NOMBRE_DOCUMENTO']))? utils::addPath(STATIC_DOCUMMENTS_PATH .'fichaDocumento/',$response['NOMBRE_DOCUMENTO']) : null;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  # ****************************************************************************************************************
  # Identificación de voz
  # ****************************************************************************************************************
  # Opcion Nueva Solicitud - Ficha Identificación- Pestaña Identificación de voz
  # Boton Guardar Identificación de voz
  # sp_B2_MF_addRegistroVoz - Agrega el archivo de voz del elemento.
  public function  sp_B2_MF_addRegistroVoz($file){
    $this->arrayToPost(array('pPATH_ARCHIVO'=>$file));
    $this->load->library('form_validation');

    $this->addParam('pID_ALTERNA','pID_ALTERNA','',array('rule'=>'trim|required|numeric|max_length[10]'));
    $this->addParam('pPATH_ARCHIVO','pPATH_ARCHIVO','',array('name'=>'Nombre del Audio','rule'=>'trim|required|max_length[100]'));
    if ($this->form_validation->run() === true) {
      $this->procedure('sp_B2_MF_addRegistroVoz');
      $this->iniParam('txtError','varchar','250');
      $this->iniParam('msg','varchar','80');
      $this->iniParam('tranEstatus','int');
      $build = $this->build_query();
      $query = $this->db->query($build);
      $response = $this->query_row($query);
      if($response == FALSE){
        $this->response['status'] = false;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.';
      }else{
        $this->response['status'] = (bool)$response['tranEstatus'];
        $this->response['message'] = ($response['tranEstatus'] == 1)? $response['msg'] : $response['txtError'];
      }
    } else {
      $this->load->helper('html');
      $this->response['status'] = false;
      $message = $this->form_validation->error_array();
      $this->response['message'] = ul($message);
      $this->response['validation'] = $message;
    }
    return $this->response;
  }

  # Opcion Nueva Solicitud  - Ficha Identificación- Pestaña Identificación de voz
  # Mostrar Datos Iniciales de la Pantalla
  # sp_B2_MF_opcRegistroVoz - Muestra los datos de la pestaña de ficha Identificación de voz
  public function sp_B2_MF_opcRegistroVoz($idAlterna = null){
    $this->procedure('sp_B2_MF_opcRegistroVoz');
    $this->addParam('pID_ALTERNA',$idAlterna);
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);
    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        foreach ($response as $key => $value) {
          $response[$key]['PATH_ARCHIVO'] = (Utils::isJSON($response[$key]['PATH_ARCHIVO']))? utils::addPath(STATIC_DOCUMMENTS_PATH.'fichaVoz/',$response[$key]['PATH_ARCHIVO']) : null;
        }
        $this->response['data'] = $this->try_result(current($response));
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;
  }

  public function sp_validaRegistro($id){

    //$this->arrayToPost({ 'id' => $id });

    $this->procedure('sp_validaRegistro');
    $this->addParam('pID_ALTERNA',$id,'');
  
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){

        $this->response['status'] = 0;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
        
    }else{
      if(count($response) > 0){

        $this->response['status'] = 1;
        $this->response['message'] = '';
        $this->response['data'] = $response;
        
      }else{

        $responseOutput = current($response);
        $this->response['status'] = 1;
        $this->response['message'] = 'No se encontraron resultados.';

      }
    }
    return $this->response;
  }

  public function sp_enviarBUS($model = null){
      $buid = "EXEC [sp_enviarBUS] @CAMPO = '" . $model['ids'] . "';";
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

  public function sp_replicarStatus($model = null){

    // $this->response['status'] = 1;
    // $this->response['data'] = [
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ],
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ],
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ],
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ],
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ],
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ],
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ],
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ],
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ],
    //   [ 'id_alterna' => 666, 'nombre' => 'asd', 'paterno' => 'asd', 'materno' => 'ads', 'tipo_op' => 'AE', 'motivo' => 'adasdadsadsads', 'estatus' => '0' ]
    // ];


      $buid = "EXEC [sp_resultadosBUS] @guid = '" . $model['guid'] . "';";
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

  public function  sp_cmbDependencias(){
    
    $this->procedure('sp_cmbDependencias');
    $this->addParam('pCURP',$this->session->userdata(SESSIONVAR)['CURP'],'N');

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;

  }

  public function  sp_cmbInstitucion($pIdDep){
    
    $this->procedure('sp_cmbInstitucion');
    $this->addParam('pCURP',$this->session->userdata(SESSIONVAR)['CURP'],'N');
    $this->addParam('pIdDep',$pIdDep);

    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){
      $this->response['status'] = 0;
      $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
    }else{
      if(count($response) > 0){
        $this->response['status'] = 1;
        $this->response['data'] = $this->try_result($response);
      }else{
        $this->response['status'] = 0;
        $this->response['message'] = 'No se encontraron resultados.';
      }
    }
    return $this->response;

  }

  public function sp_concluyeRegistro($id){

    //$this->arrayToPost({ 'id' => $id });

    $this->procedure('sp_concluyeRegistro');
    $this->addParam('pID_ALTERNA',$id,'');
  
    $buid = $this->build_query();
    $query = $this->db->query($buid);
    $response = $this->query_list($query);

    if($response === FALSE){

        $this->response['status'] = 0;
        $this->response['message'] = 'Ha ocurrido un error al procesar su última acción.' . " [ GUID = {$this->config->item('GUID')} ]";
        
    }else{
      if(count($response) > 0){

        $this->response['status'] = 1;
        $this->response['message'] = '';
        $this->response['data'] = $response;
        
      }else{

        $responseOutput = current($response);
        $this->response['status'] = 1;
        $this->response['message'] = 'No se encontraron resultados.';

      }
    }
    return $this->response;
  }

  public function statusSolicitud($idAlterna){
    
    $this->select('FOLIO,TIPO_OPERACION,DESCRIPCION,ESTATUS,DESCRIPCION_ESTATUS');
    $this->where('FOLIO', $idAlterna);
    return $this->response_list();
    
  }

}