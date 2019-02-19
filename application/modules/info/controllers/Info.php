<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->carabiner->js('info/info/index.js');
        $data = array();
        
        $this->load->model('DeBitacora_model');
        $accesoMes = $this->DeBitacora_model->getCantidadAccesosMes();
        
        $data['mes'] = array();
        $data['mesCantidad'] = array();
        if(is_array($accesoMes)){
            foreach ($accesoMes as $accesoM) {
                $data['mes'][] = $accesoM['MesNombre'];
                $data['mesCantidad'][] = $accesoM['Cantidad'];
            }
        }
        
        $accesoDia = $this->DeBitacora_model->getCantidadAccesosDia();
        
        $data['dia'] = array();
        $data['diaCantidad'] = array();
        if(is_array($accesoDia)){
            foreach ($accesoDia as $accesoD) {
                $data['dia'][] = $accesoD['DiaNombre'];
                $data['diaCantidad'][] = $accesoD['Cantidad'];
            }
        }

        $this->load->view('/info/index',$data);
    }
    
    public function detalleBitadora() {
        
        $id = $this->input->get('id');
        $this->load->model('DeBitacora_model');
        
        $data = array();
        $data['bitacora'] = $this->DeBitacora_model->getBitacora_id($id);
        
        $this->load->view('/info/detalleBitadora',$data);
        //utils::pre($response);
        
    }
    
}