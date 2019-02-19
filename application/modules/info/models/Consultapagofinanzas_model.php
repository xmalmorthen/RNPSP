<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class ConsultaPagoFinanzas_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    public function set($folio,$codigo,$mensaje,$total){        
         $data = array(
            'id_Usuario' => $this->session->userdata('user_id'),
            'Folio' => $folio,
            'Codigo' => $codigo,
            'Mensaje' => $mensaje,
            'Total' => $total,
        );
        $this->db->insert('ca_ConsultaPagoFinanzas',$data);
    }
    
    public function verificaFolio($folio) {
        $this->db
                ->select('id_ConsultaPagoFinanzas,Folio,Codigo,Mensaje,Total')
                ->from('ca_ConsultaPagoFinanzas')
                ->where('Folio',$folio)
                ->where('FechaExpiracion >','now()',false)
                ->order_by('id_ConsultaPagoFinanzas','desc')
                ->limit(1);
        
        $query = $this->db->get();
        $num_rows = $query->num_rows();
        $query->free_result();
        return $num_rows;
        
    }
    
    public function getFolio($folio) {
        $this->db
                ->select('id_ConsultaPagoFinanzas,Folio,Codigo,Mensaje,Total')
                ->from('ca_ConsultaPagoFinanzas')
                ->where('Folio',$folio)
                ->where('FechaExpiracion > ','now()',false)
                ->order_by('id_ConsultaPagoFinanzas','desc')
                ->limit(1);
        
        $query = $this->db->get();
        $num_rows = $query->num_rows();
        $result = $query->row_array();
        $query->free_result();
//        utils::pre($this->db->last_query());
        return $result;
    }
    
}