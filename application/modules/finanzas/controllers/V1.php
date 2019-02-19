<?php defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends REST_Controller
{
    public $data = array();
    function __construct()
    {
        parent::__construct();

        $this->data = array(
            'error' => false,
            'info' => array('mensaje'=>array('EXITO')),
            'data' => array()
        );
    }

    function verificaPago_post(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('folio', 'folio', 'trim|required|max_length[45]');
        
        if ($this->form_validation->run($this) == TRUE){
            $folio = $this->input->post('folio');
            $error = false;
            $this->load->model('ConsultaPagoFinanzas_model');
            $folioVigente = $this->ConsultaPagoFinanzas_model->verificaFolio($folio);
            
            if($folioVigente == 0){
                $this->load->model('Finanzas_model');
                $respuesta = $this->Finanzas_model->verificaPago($folio);

                if($respuesta != FALSE){
                    $consulta = $this->ConsultaPagoFinanzas_model->set($folio,$respuesta['codigo'],$respuesta['mensaje'],$respuesta['total']);
                }  else {
                    $error = true;
                }
            }
            
            if($error == false){
                $this->data['data'] = $this->ConsultaPagoFinanzas_model->getFolio($folio);
            }  else {
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('Ha ocurrido un error al conectar con el servicio de finanzas');
            }
        }else{
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        
        $this->response($this->data, 200);
    }
    
}