<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function v1() {
        $this->carabiner->js('curp/info/v1.js');
        
        $this->load->model('CaMetodos_model');
        
        $data = array();
        $data['detalle'] = $this->CaMetodos_model->getDetalleMetodo_id(7);
        
        $this->load->model('General_model');
        $data['metodos'] = $this->General_model->getMetodos_idControlador(7);

        if(is_array($data['metodos'])) {
            foreach ($data['metodos'] as $keyMetodo => $metodo) {
                $data['metodos'][$keyMetodo]['usuarios'] = array();
                $data['metodos'][$keyMetodo]['usuarios'] = $this->General_model->getUsuariosMetodos($metodo['id_Metodo']);
            }
        }
        
        $this->load->view('/info/v1',$data);
    }
    
}