<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class CaTiposModulos_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    public function get(){
        $this->db
                ->select('ca_TipoModulos.id_TipoModulo,ca_TipoModulos.Nombre,ca_TipoModulos.Icono')
                ->from('ca_TipoModulos');
        $query = $this->db->get();
        $result = $query->result_array();
        $num_rows = $query->num_rows();
        return ($num_rows > 0)? $result : false;
    }
}