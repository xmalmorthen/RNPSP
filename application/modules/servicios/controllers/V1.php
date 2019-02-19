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

    function controlVersionGit_post(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sistema', 'sistema', 'trim|required');
        $this->form_validation->set_rules('version', 'version', 'trim|required|max_length[45]');
        
        if ($this->form_validation->run($this) == TRUE){
            $sistema = $this->input->post('sistema');
            $version = $this->input->post('version');
            
            $this->load->model('DeVersionesSistema_model');
            $idVesionSistema = $this->DeVersionesSistema_model->set($sistema,$version);
            $this->data['data'] = array('idVesionSistema'=>$idVesionSistema);
            
        }else{
            $this->data['error'] = true;
            $this->data['info']['mensaje'] = $this->form_validation->validation_errors();
        }
        
        $this->response($this->data, 200);
    }
    
}