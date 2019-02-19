<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class CaParametrosSalida_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    public function getParametros_Metodo($id_Metodo){
        $this->db
                ->select('id_ParametroSalida,id_Metodo,Nodo,Nombre,Tipo')
                ->from('ca_ParametrosSalida')
                ->where('id_Metodo',$id_Metodo);
        $query = $this->db->get();
        $result = $query->result_array();
        $num_rows = $query->num_rows();
        return ($num_rows > 0)? $result : false;
    }
}