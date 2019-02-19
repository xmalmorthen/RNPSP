<?php defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends CI_Controller {
    public $server;
    function __construct() {
        $this->server = get_class($this); 
        parent::__construct();
        
        $this->load->library("NuSoap");
        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL($this->server, "urn:".site_url($this->server.'/index?wsdl'));
        
//        include(dirname(__FILE__).'/wsdl/ComplexType.php');
        include(dirname(__FILE__).'/wsdl/'.$this->server.'.php');
        
        function Enviar_Mail($correo,$titulo,$mensaje,$destinatario){
            $CI =& get_instance();
            $CI->load->model('Correos_model');
            $result = $CI->Correos_model->enviar($correo,$titulo,$mensaje,$destinatario);
            $CI->benchmark->mark('code_end');
            if($result['error'] == false){
                $data = array(
                    'status_response' => TRUE,
                    'message' => 'EXITO',
                    'fecha' => date("Y-m-d"),
                    'hora' => date("H:i:s"),
                    'response_key' => utils::folio($result['id_correo']),
                    'response_time' => $CI->benchmark->elapsed_time('code_start', 'code_end'),
                    'detalle' => site_url('inicio/estado_envio/'.base64_encode($result['id_correo']))
                );
            }else{
                $data = array(
                    'status_response' => FALSE,
                    'message' => 'ERROR',
                    'fecha' => date("Y-m-d"),
                    'hora' => date("H:i:s"),
                    'response_key' => utils::folio($result['id_correo']),
                    'response_time' => $CI->benchmark->elapsed_time('code_start', 'code_end'),
                    'detalle' => site_url('inicio/estado_envio/'.base64_encode($result['id_correo']))
                );
            }
            return json_encode($data);
        }
    }

    function index() {
        $this->nusoap_server->service(file_get_contents('php://input'));
    }
}