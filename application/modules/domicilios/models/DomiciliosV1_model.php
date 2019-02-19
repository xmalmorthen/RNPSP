<?php
class DomiciliosV1_model extends CI_Model {
    
    function __construct(){
        parent::__construct();    
        $this->load->helper('text');
        $this->config->load('configV1');
    }
    
    function getEntidades(){
        $this->db
                ->select('id_Entidad,Descripcion,Sigla')
                ->from('WS07_ca_Entidades')
                ->order_by('id_Entidad','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->result_array() : false;
        $query->free_result();
        return $result;
    }
    
    function getEntidad($id_Entidad){
         
        $this->db
                ->select('id_Entidad,Descripcion,Sigla')
                ->from('WS07_ca_Entidades')
                ->where('id_Entidad',$id_Entidad)
                ->order_by('id_Entidad','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->row_array() : false;
        $query->free_result();
        return $result;
    }
    
    function vigenciaEntidad($id_Entidad){
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        
        $this->db
                ->select('id_Entidad,Descripcion,Sigla,FechaRegistroMunicipios,(SELECT count(id_Municipio) from WS07_ca_Municipios where WS07_ca_Municipios.id_Entidad = WS07_ca_Entidades.id_Entidad) as NumMunicipios',false)
                ->from('WS07_ca_Entidades')
                ->where('id_Entidad',$id_Entidad)
                ->where('DATE_ADD(DATE(FechaRegistroMunicipios), INTERVAL 60 DAY) >',$curr_date)
                ->order_by('id_Entidad','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->row_array() : false;
        $query->free_result();
        return $result;
    }
    
    function vigenciaMunicipio($id){
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        
        $this->db
                ->select('id_Municipio,id_Entidad,Descripcion,(SELECT count(id_Localidad) from WS07_ca_Localidades where WS07_ca_Localidades.id_Municipio = WS07_ca_Municipios.id_Municipio) as NumLocalidades',false)
                ->from('WS07_ca_Municipios')
                ->where('id_Municipio',$id)
                ->where('DATE_ADD(DATE(FechaRegistroLocalidades), INTERVAL 60 DAY) >',$curr_date)
                ->order_by('Descripcion','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->row_array() : false;
        $query->free_result();
        return $result;
    }
    
    function vigenciaLocalidad($id){
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        
        $this->db
                ->select('id_Localidad,id_Municipio,Descripcion,(SELECT count(id_Colonia) from WS07_ca_Colonias where WS07_ca_Colonias.id_Localidad = WS07_ca_Localidades.id_Localidad) as NumColonias',false)
                ->from('WS07_ca_Localidades')
                ->where('id_Localidad',$id)
                ->where('DATE_ADD(DATE(FechaRegistroColonias), INTERVAL 60 DAY) >',$curr_date)
                ->order_by('Descripcion','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->row_array() : false;
        $query->free_result();
        return $result;
    }
    
    function vigenciaColonia($id){
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        
        $this->db
                ->select('id_Colonia,id_Localidad,Descripcion,CodigoPostal,(SELECT count(id_Calle) from WS07_ca_Calles where WS07_ca_Calles.id_Colonia = WS07_ca_Colonias.id_Colonia) as NumCalles',false)
                ->from('WS07_ca_Colonias')
                ->where('id_Colonia',$id)
                ->where('DATE_ADD(DATE(FechaRegistroCalles), INTERVAL 60 DAY) >',$curr_date)
                ->order_by('Descripcion','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->row_array() : false;
        $query->free_result();
        return $result;
    }
    
    public function getWebserviceMunicipios($entidad) {
        $config = $this->config->item('ws_domicilios');
        $this->load->spark('restclient/2.1.0');
        $this->restclient->initialize(array('server' => $config['host']));
        $results_ws = $this->restclient->get("ListaMunicipios", $entidad);
        return (is_array($results_ws)? current($results_ws) : false);
    }
    
    public function getWebserviceLocalidades($id) {
        $config = $this->config->item('ws_domicilios');
        $this->load->spark('restclient/2.1.0');
        $this->restclient->initialize(array('server' => $config['host']));
        $results_ws = $this->restclient->get("ListaLocalidades", $id);
        return (is_array($results_ws)? current($results_ws) : false);
    }
    
    public function getWebserviceColonias($id) {
        $config = $this->config->item('ws_domicilios');
        $this->load->spark('restclient/2.1.0');
        $this->restclient->initialize(array('server' => $config['host']));
        $results_ws = (array)$this->restclient->get("ListaColonias", $id);
        $colonias = (is_array($results_ws)? current($results_ws) : false);
        return (isset($colonias->cve_Colonias)? array($colonias) : $colonias);
    }
    
    public function getWebserviceCalles($id) {
        $config = $this->config->item('ws_domicilios');
        $this->load->spark('restclient/2.1.0');
        $this->restclient->initialize(array('server' => $config['host']));
        $results_ws = (array)$this->restclient->get("ListaCalles", $id);
        $colonias = (is_array($results_ws)? current($results_ws) : false);
        return (isset($colonias->cve_Colonias)? array($colonias) : $colonias);
    }
    
    public function setMunicipios($entidad,$listado) {
        foreach ($listado as $nodo) {
            $insert = array(
                'id_Municipio'  => (string)$nodo->cve_Municipios,
                'id_Entidad'    => (string)$nodo->cveEntidades_Municipios,
                'Descripcion'    => utf8_decode((string)$nodo->descrip_Municipios),
            );
            $this->db->replace('WS07_ca_Municipios', $insert);
        }
        
        $this->db->set('FechaRegistroMunicipios', 'NOW()', FALSE);
        $this->db->where('id_Entidad',$entidad);
        return $this->db->update('WS07_ca_Entidades');
    }
    
    public function setLocalidades($municipio,$listado) {
        
        foreach ($listado as $nodo) {
            $insert = array(
                'id_Localidad'  => (string)$nodo->cve_Localidades,
                'id_Municipio'    => (string)$nodo->cveMunicipios_Localidades,
                'Descripcion'   => utf8_decode((string)$nodo->nombre_Localidades)
            );
            $this->db->set('FechaRegistro', 'NOW()', FALSE);
            $this->db->replace('WS07_ca_Localidades', $insert);
        }
        
        $this->db->set('FechaRegistroLocalidades', 'NOW()', FALSE);
        $this->db->where('id_Municipio',$municipio);
        return $this->db->update('WS07_ca_Municipios');
    }
    
    public function setColonias($localidad,$listado) {
        
        foreach ($listado as $nodo) {
            $insert = array(
                'id_Colonia'  => (string)$nodo->cve_Colonias,
                'id_Localidad'    => (string)$nodo->cveLocalidad_Colonias,
                'Descripcion'   => utf8_decode((string)$nodo->nombre_NombresColonias),
                'CodigoPostal' => (string)$nodo->cp_Colonias,
                'Origen' => 'WEBSERVICE'
            );
            $this->db->set('FechaRegistro', 'NOW()', FALSE);
            $this->db->replace('WS07_ca_Colonias', $insert);
        }
        
        $this->db->set('FechaRegistroColonias', 'NOW()', FALSE);
        $this->db->where('id_Localidad',$localidad);
        return $this->db->update('WS07_ca_Localidades');
    }
    
    public function setCalles($colonia,$listado) {
        
        foreach ($listado as $nodo) {
            $insert = array(
                'id_Calle'  => (string)$nodo->cve_Calles,
                'id_Colonia'    => (string)$nodo->cveColonias_Calles,
                'Descripcion'   => utf8_decode((string)$nodo->nombre_NombresCalles),
                'CodigoPostal' => (string)$nodo->cp_Colonias,
                'Origen' => 'WEBSERVICE'
            );
            $this->db->set('FechaRegistro', 'NOW()', FALSE);
            $this->db->replace('WS07_ca_Calles', $insert);
        }
        
        $this->db->set('FechaRegistroCalles', 'NOW()', FALSE);
        $this->db->where('id_Colonia',$colonia);
        return $this->db->update('WS07_ca_Colonias');
    }
    
    function getMunicipios($entidad){
        $this->db
                ->select('id_Municipio,Descripcion')
                ->from('WS07_ca_Municipios')
                ->where('id_Entidad',$entidad)
                ->order_by('Descripcion','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->result_array() : false;
        $query->free_result();
        return $result;
    }
    
    function getLocalidades($id){
        $this->db
                ->select('id_Localidad,Descripcion')
                ->from('WS07_ca_Localidades')
                ->where('id_Municipio',$id)
                ->order_by('Descripcion','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->result_array() : false;
        $query->free_result();
        return $result;
    }
    
    function getColonias($id){
        $this->db
                ->select('id_Colonia,Descripcion,CodigoPostal')
                ->from('WS07_ca_Colonias')
                ->where('id_Localidad',$id)
                ->order_by('Descripcion','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->result_array() : false;
        $query->free_result();
        return $result;
    }
    
    function getCalles($id){
        $this->db
                ->select('id_Calle,Descripcion,CodigoPostal')
                ->from('WS07_ca_Calles')
                ->where('id_Colonia',$id)
                ->order_by('Descripcion','asc');
        $query = $this->db->get();
        $result = ($query->num_rows()>0)? $query->result_array() : false;
        $query->free_result();
        return $result;
    }

}