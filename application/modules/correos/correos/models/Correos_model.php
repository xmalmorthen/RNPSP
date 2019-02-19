<?php
class Correos_model extends CI_Model {
    
    function __construct(){
        parent::__construct();    
        $this->load->helper('text');
    }
    
    function enviar($correo,$titulo,$mensaje,$destinatario){        
        
        $correo = (strlen(trim($correo)) > 0)? $correo : 'dont_reply@col.gob.mx';
        $this->load->library("email", $this->config()); 
        $this->email->set_newline("\r\n");
        $this->email->from($correo, 'Gobierno del Estado de Colima');
        $this->email->to($destinatario);
        $this->email->subject($titulo);
        $this->email->message($mensaje);
        $results_rsc = $this->email->send(false);

        $debug = ($results_rsc == false)? $this->email->print_debugger() : null;
        $data = array(
            'correo' => $correo,
            'titulo' => $titulo,
            'Contenido' => $mensaje,
            'destinatario' => $destinatario,
            'Exito' => $results_rsc,
            'Error' => $debug
        );
        $this->db->insert('ca_CorreosEnviados',$data);
        $id_correo = $this->db->insert_id();
		
        return ($results_rsc == false)? array('error'=>true,'id_correo'=>$id_correo) : array('error'=>false,'id_correo'=>$id_correo);
    }
    
    private function config(){
        $config = array(
            'protocol'=>'smtp',
            'smtp_host'=>'correo.col.gob.mx',
            'smtp_port'=>'25',
            'mailtype' => 'html',
            'charset' => 'utf-8',
//            'crlf' => "\r\n",
            'wordwrap' => TRUE,
//            'newline' => "\r\n"
        );
        $config2 = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => '', 
            'smtp_pass' => '', 
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'crlf' => "\r\n",
            'newline' => "\r\n",
            'smtp_timeout' => 7
        );
        $config3 = array(
            'protocol'=>'smtp',
            'smtp_host'=>'correo.col.gob.mx',
            'smtp_user'=>'miempresa@col.gob.mx',
            'smtp_crypto'=>'tls',
            'smtp_pass'=>"colimamiempresa",
            'smtp_port'=>'25',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'crlf' => "\r\n",
            'newline' => "\r\n"
                //'wordwrap' => TRUE,
                //'newline' => "\r\n"
        );
        
        return $config3;
    }
}