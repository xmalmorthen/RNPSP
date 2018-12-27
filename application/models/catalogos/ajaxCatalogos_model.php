<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxCatalogos_model extends CI_Model {
        public function __construct(){
                parent::__construct();
        }

        public function get($query){
                $returnResponse = NULL;
                try {
                        $this->db->cache_on();
                        $query = $this->db->query($query);
                        $this->db->cache_off();

                        if (!$query){
                                throw new Exception($this->db->error()['message']);
                        }

                        $returnResponse = $query->result();
                }
                catch (Exception $e) {
                        log_message('error',$e->getMessage() . " [ GUID = {$this->config->item('GUID')} ]");
                }

                return $returnResponse;
        }
}