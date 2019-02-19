<?php defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends REST_Controller
{
    public $data = array();
    public $contolador = 10;
    function __construct()
    {
        parent::__construct();
        $this->data = array(
            'error' => false,
            'info' => array('mensaje'=>array('EXITO')),
            'data' => array()
        );
    }
    
    public function listadoEntidades_GET() {
        $this->load->model('DomiciliosV1_model');
        $registros = $this->DomiciliosV1_model->getEntidades();
        
        if($registros != false){
            $this->data['data'] = $registros;
        } else {
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = array('No se encontrarón resultados');
        }
        $this->response($this->data, 200);
    }
    
    public function entidad_POST() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('entidad', 'entidad', 'trim|required');
        
        if ($this->form_validation->run($this) == TRUE){
            $id = $this->input->post('entidad');
        
            $this->load->model('DomiciliosV1_model');
            $registros = $this->DomiciliosV1_model->getEntidad($id);

            if($registros != false){
                $this->data['data'] = $registros;
            } else {
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('No se encontrarón resultados');
            }
        }else{
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        $this->response($this->data, 200);
    }
    

    function listadoMunicipios_POST(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('entidad', 'entidad', 'trim|required');
        
        if ($this->form_validation->run($this) == TRUE){
            $entidad = $this->input->post('entidad');
            
            $this->load->model('DomiciliosV1_model');
            $vigenciaEntidad = $this->DomiciliosV1_model->vigenciaEntidad($entidad);
            
            #ENTIDAD VIGENTE
            $this->data['info']['data'] = $vigenciaEntidad;
            if($vigenciaEntidad == false){
                $listadoWS = $this->DomiciliosV1_model->getWebserviceMunicipios($entidad);
                if($listadoWS != FALSE){
                    
                    $this->data['info']['mensaje'][] = 'Origen Webservice';
                    $this->DomiciliosV1_model->setMunicipios($entidad,$listadoWS);
                    
                }else{
                    $this->data['info']['mensaje'][] = 'No se encontrarón registros en el WEBSERVICE GENERAL';
                    
                }   
            }else{
                $this->data['info']['mensaje'][] = 'Origen Base de Datos';
            }
            $listado = $this->DomiciliosV1_model->getMunicipios($entidad);
            
            if($listado == false){
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('No se localizarón resultados.');
            }  else {
                $this->data['data'] = $listado;
            }
        }else{
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        
        $this->response($this->data, 200);
    }
    
    function listadoLocalidades_POST(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('municipio', 'municipio', 'trim|required');
        
        if ($this->form_validation->run($this) == TRUE){
            $municipio = $this->input->post('municipio');
            
            $this->load->model('DomiciliosV1_model');
            $vigencia = $this->DomiciliosV1_model->vigenciaMunicipio($municipio);

            #ENTIDAD VIGENTE
            $this->data['info']['data'] = $vigencia;
            if($vigencia == false || ( array_key_exists('NumLocalidades', $vigencia) && $vigencia['NumLocalidades'] == 0)){
                $listadoWS = $this->DomiciliosV1_model->getWebserviceLocalidades($municipio);

                if($listadoWS != FALSE){
                    $this->data['info']['data']['NumLocalidades'] = count($listadoWS);
                    $this->data['info']['mensaje'][] = 'Origen Webservice';
                    $this->DomiciliosV1_model->setLocalidades($municipio,$listadoWS);
                    
                }else{
                    $this->data['info']['mensaje'][] = 'No se encontrarón registros en el WEBSERVICE GENERAL';
                    
                }   
            }else{
                $this->data['info']['mensaje'][] = 'Origen Base de Datos';
            }
            $listado = $this->DomiciliosV1_model->getLocalidades($municipio);
            
            if($listado == false){
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('No se localizarón resultados.');
            }  else {
                $this->data['data'] = $listado;
            }
        }else{
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        
        $this->response($this->data, 200);
    }
    
    function listadoColonias_POST(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('localidad', 'localidad', 'trim|required');
        
        if ($this->form_validation->run($this) == TRUE){
            $localidad = $this->input->post('localidad');
            
            $this->load->model('DomiciliosV1_model');
            $vigencia = $this->DomiciliosV1_model->vigenciaLocalidad($localidad);

            #ENTIDAD VIGENTE
            $this->data['info']['data'] = $vigencia;
            if($vigencia == false || ( array_key_exists('NumColonias', $vigencia) && $vigencia['NumColonias'] == 0)){
                $listadoWS = $this->DomiciliosV1_model->getWebserviceColonias($localidad);
                if($listadoWS != FALSE){
                    $this->data['info']['data']['NumColonias'] = count($listadoWS);
                    $this->data['info']['mensaje'][] = 'Origen Webservice';
                    $this->DomiciliosV1_model->setColonias($localidad,$listadoWS);

                }else{
                    $this->data['info']['mensaje'][] = 'No se encontrarón registros en el WEBSERVICE GENERAL';
                    
                }   
            }else{
                $this->data['info']['mensaje'][] = 'Origen Base de Datos';
            }
            $listado = $this->DomiciliosV1_model->getColonias($localidad);
            
            if($listado == false){
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('No se localizarón resultados.');
            }  else {
                $this->data['data'] = $listado;
            }
        }else{
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        
        $this->response($this->data, 200);
    }
    
    function listadoCalles_POST(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('colonia', 'colonia', 'trim|required');
        
        if ($this->form_validation->run($this) == TRUE){
            $colonia = $this->input->post('colonia');
            
            $this->load->model('DomiciliosV1_model');
            $vigencia = $this->DomiciliosV1_model->vigenciaColonia($colonia);
            
            #ENTIDAD VIGENTE
            $this->data['info']['data'] = $vigencia;
            if($vigencia == false || ( array_key_exists('NumCalles', $vigencia) && $vigencia['NumCalles'] == 0)){
                $listadoWS = $this->DomiciliosV1_model->getWebserviceCalles($colonia);
                if($listadoWS != FALSE){
                    $this->data['info']['data']['NumCalles'] = count($listadoWS);
                    $this->data['info']['mensaje'][] = 'Origen Webservice';
                    $this->DomiciliosV1_model->setCalles($colonia,$listadoWS);

                }else{
                    $this->data['info']['mensaje'][] = 'No se encontrarón registros en el WEBSERVICE GENERAL';
                    
                }   
            }else{
                $this->data['info']['mensaje'][] = 'Origen Base de Datos';
            }
            $listado = $this->DomiciliosV1_model->getCalles($colonia);
            
            if($listado == false){
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('No se localizarón resultados.');
            }  else {
                $this->data['data'] = $listado;
            }
        }else{
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        
        $this->response($this->data, 200);
    }
    
}