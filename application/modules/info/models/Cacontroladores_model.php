<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class CaControladores_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    public function getControladores_Modulo($id_Modulo){
        $this->db
                ->select('ca_Controladores.id_Controlador,ca_Controladores.Controlador,ca_Controladores.Nombre')
                ->from('ca_Controladores')
                ->where('ca_Controladores.id_Modulo',$id_Modulo);
        $query = $this->db->get();
        $result = $query->result_array();
        $num_rows = $query->num_rows();
        return ($num_rows > 0)? $result : false;
    }
}