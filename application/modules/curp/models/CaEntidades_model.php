<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CaEntidades_model extends CI_Model {
	
    public function __construct() {
            parent::__construct();
    }
    
    public function getEntidad_sigla($sigla){
        $this->db
                ->select('id_Entidad,Descripcion,Sigla')
                ->from('WS07_ca_Entidades')
                ->where('Sigla',$sigla);
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->row_array() : false;
        $query->free_result();
        return $result;
    }
}