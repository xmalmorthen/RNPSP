<?php
class Dependencia_model extends CI_Model{
	
    public function __construct() {
        parent::__construct();
    	
        $this->load->config('config');
        $db = $this->config->item('dbColimaEstado');
        $ci = & get_instance();
        $this->dbColimaEstado = $this->load->database($db,true);
        unset($ci);
    }
    
    public function getDependencia($id_dep=0){	
        $this->$this->dbColimaEstado->select('id_dependencia, dependencia, url_sitio, id_padre, txt_busqueda, codigo_seguimiento, metatags, shortname, usr_flickr, usr_youtube, opd, usr_fbook, usr_twitter, textbreadcrumb');
        $this->$this->dbColimaEstado->from('cat_dependencias');
        $this->$this->dbColimaEstado->where('id_dependencia', $id_dep );

        $query = $this->$this->dbColimaEstado->get();
        $result = ($query->num_rows() > 0)? $query->row_array() : false;
        $query->free_result();
        return $result;
    }
	
	
	
	
}
