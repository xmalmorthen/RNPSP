<?php
class CorreosV3_model extends CI_Model {
    
    function __construct(){
        parent::__construct();    
        $this->load->helper('text');
    }
    
    function enviar($correo,$titulo,$contenido){        
        
        $correo = (strlen(trim($correo)) > 0)? $correo : 'dont_reply@col.gob.mx';
        $contenido .= '<hr style=" border: 0; border-bottom: 1px dashed #ccc; background: #999;" />'
                . '<table style="width:100%; font-size:10px; color:#666666" >'
                    . '<tr>'
                        . '<td rowspan="1" style="width:200px">'
                            . ' <img src="http://www.colima-estado.gob.mx/ci/img/logo_gob_hd.jpg" >'
                        . '</td>'
                        . '<td>'
                            . 'No respondas a este correo electrónico.<br/>'
                            . 'No podemos responder las consultas que se envíen a esta dirección.<br/>'
//                            . 'Para obtener respuesta inmediata a tus preguntas, comunicate nuestro Centro de ayuda al telefono (312) 316 2000.'
                        . '</td>'
                    . '</tr>'
                . '</table>';

        $configIni = @parse_ini_file( dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'smtp.ini',true);
        if($configIni == FALSE){ die('No se encontro archivo de configuracion correos.'); }
        $config = $configIni['yahoo'];
        
        $this->load->library('email',$config);

        //$this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        
        if(array_key_exists('email', $config)){
            $this->email->from($config['email'], 'Gobierno del Estado de Colima');
        }
        
        $this->email->to($correo);
        $this->email->subject($titulo);
        $this->email->message($contenido);
        $results_rsc = $this->email->send(false);
        $debug = ($results_rsc == false)? $this->email->print_debugger() : null;
        
        $id_correo = $this->bitacora($correo,$titulo,$contenido,$results_rsc,$debug);
        
        return ($results_rsc == false)? array('error'=>true,'id_correo'=>$id_correo) : array('error'=>false,'id_correo'=>$id_correo);
    }
    
    private function bitacora($correo,$titulo,$contenido,$results_rsc,$debug) {
        $uuid = utils::guid();
        
        $data = array(
            'id_CorreoV3Bitadora'   => $uuid,
            'correo'                => $correo,
            'titulo'                => $titulo,
            'Contenido'             => $contenido,
            'Exito'                 => $results_rsc,
            'Error'                 => $debug
        );

        $this->db->insert('ca_CorreosV3Bitacora',$data);
        return $uuid;
    }
}