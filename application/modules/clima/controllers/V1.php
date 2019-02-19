<?php defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends REST_Controller
{
    public $data = array();
    public $contolador;
    function __construct()
    {
        $this->contolador = 1;
        parent::__construct();
        $this->data = array(
            'error' => false,
            'info' => array('mensaje'=>array('EXITO')),
            'data' => array()
        );

    }
    function index_get(){
        redirect('clima/info/v1');
    }
    
    function estadotiempo_post(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('localizacion', 'localizacion', 'trim|required');

        if ($this->form_validation->run($this) == TRUE){
            $this->load->model('Weather_model');
            $ubicacion = $this->input->post('localizacion',true);
            $result = $this->Weather_model->get($ubicacion);

            if($result != false){
                $this->data['data'] = $result;    
            } else {
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array("No se encontro la ubicacion {$ubicacion}");
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