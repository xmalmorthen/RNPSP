<?php defined('BASEPATH') OR exit('No direct script access allowed');

class V2 extends REST_Controller
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

    function enviar_post(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('correoDestinatario', 'correoDestinatario', 'trim|required');
        $this->form_validation->set_rules('correoEmisor', 'correoEmisor', 'trim');
        $this->form_validation->set_rules('titulo', 'titulo', 'trim|required');
        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required');
        
        if ($this->form_validation->run($this) == TRUE){
            $correoDestinatario = $this->input->post('correoDestinatario');
            $correoEmisor = $this->input->post('correoEmisor');
            $titulo = $this->input->post('titulo');
            $mensaje = $this->input->post('mensaje');
            
            $this->load->model('Correos_model');
            $result = $this->Correos_model->enviar($correoEmisor,$titulo,$mensaje,$correoDestinatario);
            if($result['error'] == false){
                $data = array(
                    'Identificador' => utils::folio($result['id_correo']),
                    'Detalle' => site_url('inicio/estado_envio/'.base64_encode($result['id_correo']))
                );
            }  else {
                $this->data['error'] = true;
                $this->data['info']['mensaje'] = array('Ha ocurrido un error al enviar el correo');
            }
            
        }else{
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        
        $this->response($this->data, 200);
    }
    
}