<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends REST_Controller
{
    function __construct() {
        parent::__construct();
    }
    
    /*==========================================================================
     * OBTIENE DATOS DE LA BITACORA DATATABLES
     *========================================================================/
     * 
     */

    public function getBitacora_post() {

        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $draw = $this->input->post('draw');
        
        $order = $this->input->post('order');
        if(is_array($order)){
            $order = current($order);
        }
        
        $this->load->model('DeBitacora_model');
        $count = $this->DeBitacora_model->CountConsultaDataTables();
        
        $data = array(
            'draw'              => $draw,
            'recordsTotal'      => $count,
            'recordsFiltered'   => $count,
            'data'              => $this->DeBitacora_model->ConsultaDataTables($start,$length),
            'recordsNow'        => $this->DeBitacora_model->CountHoyConsultaDataTables()
        );

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data))
            ->_display();
        exit;
    }
    public function getBitacora_get() {
        $this->load->model('DeBitacora_model');
        $data = array(
            'bitacora'       => $this->DeBitacora_model->getTotalPericiones()
        );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data))
            ->_display();
        exit;
    }
    
    
    
    
}
