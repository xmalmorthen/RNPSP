<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function v1() {
        //$this->carabiner->js('portalUnico/info/v1.js');
        
        $data = array();
        
        $this->load->model('CaMetodos_model');
        $data['detalle'] = $this->CaMetodos_model->getDetalleMetodo_id(8);
        
        $this->load->model('General_model');
        $data['metodos'] = $this->General_model->getMetodos_idControlador(8);
        

        if(is_array($data['metodos']))
        {
            foreach ($data['metodos'] as $keyMetodo => $metodo)
            {
                $data['metodos'][$keyMetodo]['usuarios'] = array();
                $data['metodos'][$keyMetodo]['usuarios'] = $this->General_model->getUsuariosMetodos($metodo['id_Metodo']);
            }
        }
        $this->load->view('/info/v1',$data);
    }
    
}