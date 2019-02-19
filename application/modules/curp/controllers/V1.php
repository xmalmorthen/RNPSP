<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends REST_Controller {

    public $data = array();
    public $contolador;
     
    function __construct()
    {
        parent::__construct();
        $this->contolador = 7;
        $this->data = array(
            'error' => false,
            'info' => array('mensaje'=>array('EXITO')),
            'data' => array()
        );
    }
    
    public function index() {
        redirect('curp/info');
    }
    
    function info_post(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('curp', 'curp', 'trim|required');
        
        if ($this->form_validation->run($this) == TRUE){
            $curp = $this->input->post('curp',true);
            
            $this->load->model('CurpV1_model');
            $this->load->model('DeBitacoraCurp_model');

            $existeCurp = $this->CurpV1_model->existeCurp($curp);
            if( $existeCurp == TRUE){
                $this->DeBitacoraCurp_model->set(GUID,'Recupero la información a partir de la base de datos');
                $datosCurp = $this->CurpV1_model->getInfoCurp($curp);
                $this->data['info']['mensaje'][] = 'La información se recupero a partir de la base de datos';
            }else{
                $datosCurp = $this->CurpV1_model->get_infoCurpWS($curp);
                $this->DeBitacoraCurp_model->set(GUID,'Recupero la información a partir del web service');
                $this->data['info']['mensaje'][] = 'La información se recupero a partir del Web Service de RENAPO';
                ob_start();
                    $this->restclient->debug();
                    $debug = ob_get_contents();
                ob_end_clean();
                $this->DeBitacoraCurp_model->set(GUID,$debug);
            }
            
            if($datosCurp == false){
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array("Los datos de la curp {$curp} no fuerón localizados.");
            }  else {
                $this->data['data'] = $datosCurp;
            }
            
        }else{
            
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
            
        }

        $this->response($this->data, 200);
    }
    
    public function buscar_post(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
            $this->form_validation->set_rules('apellido1', 'apellido1', 'trim|required');
            $this->form_validation->set_rules('apellido2', 'apellido2', 'trim');
            $this->form_validation->set_rules('fechaNacimiento', 'fechaNacimiento', 'trim|required');
            $this->form_validation->set_rules('entidad', 'entidad', 'trim|required');
            $this->form_validation->set_rules('genero', 'genero', 'trim|required');
        
        if ($this->form_validation->run($this) == TRUE){
            $nombre = $this->input->post('nombre');
            $apellido1 = $this->input->post('apellido1');
            $apellido2 = $this->input->post('apellido2');
            $fechaNacimiento = $this->input->post('fechaNacimiento');
            $entidad = $this->input->post('entidad');
            $genero = $this->input->post('genero');
            
            $this->load->model('CurpV1_model');
            $this->load->model('DeBitacoraCurp_model');

            $existeCurp = $this->CurpV1_model->existeDatosCurp($nombre,$apellido1,$apellido2,$entidad,$fechaNacimiento,$genero);
            if( $existeCurp == TRUE){
                $this->DeBitacoraCurp_model->set(GUID,'Recupero la información a partir de la base de datos');
                $datosCurp = $this->CurpV1_model->getDatosCurp($nombre,$apellido1,$apellido2,$entidad,$fechaNacimiento,$genero);
                $this->data['info']['mensaje'][] = 'La información se recupero a partir de la base de datos';
            }else{
                if(strlen(trim($entidad)) < 3){
                    $this->load->model('CaEntidades_model');
                    $entidadCopleta = $this->CaEntidades_model->getEntidad_sigla($entidad);
                    $entidad = ($entidad != false)? $entidadCopleta['Descripcion'] : $entidad;
                }
                
                $datosCurp = $this->CurpV1_model->get_DatosCurpWS($nombre,$apellido1,$apellido2,$entidad,$fechaNacimiento,$genero);
                $this->DeBitacoraCurp_model->set(GUID,'Recupero la información a partir del web service');
                $this->data['info']['mensaje'][] = 'La información se recupero a partir del Web Service de RENAPO';
                ob_start();
                    $this->restclient->debug();
                    $debug = ob_get_contents();
                ob_end_clean();
                $this->DeBitacoraCurp_model->set(GUID,$debug);
            }
            
            if($datosCurp == false){
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array("Los datos de la curp {$curp} no fuerón localizados.");
            }  else {
                $this->data['data'] = $datosCurp;
            }
            
        }else{
            
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
            
        }

        $this->response($this->data, 200);
    }
    
    public function bitacora_post() {

        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $draw = $this->input->post('draw');
        
        $order = $this->input->post('order');
        if(is_array($order)){
            $order = current($order);
        }
        
        $this->load->model('DeBitacora_model');
        $count = $this->DeBitacora_model->CountConsultaDataTablesControlador($this->contolador);
        
        $data = array(
            'draw'              => $draw,
            'recordsTotal'      => $count,
            'recordsFiltered'   => $count,
            'data'              => $this->DeBitacora_model->ConsultaDataTablesControlador($start,$length,$this->contolador)
        );

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data))
            ->_display();
        exit;
    }
}
