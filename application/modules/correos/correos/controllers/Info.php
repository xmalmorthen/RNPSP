<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function v3() {
        $this->carabiner->js('correos/info/v3.js');
        
        $this->load->model('CaMetodos_model');
        
        $data = array();
        $data['detalle'] = $this->CaMetodos_model->getDetalleMetodo_id(6);
        
        $this->load->model('General_model');
        $data['metodos'] = $this->General_model->getMetodos_idControlador(6);

        $this->load->view('/info/v3',$data);
    }
    
}